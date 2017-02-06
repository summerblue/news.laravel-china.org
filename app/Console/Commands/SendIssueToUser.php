<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Issue;
use App\Models\Post;
use App\Models\Link;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

class SendIssueToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:send_issue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发布周刊';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 取出还未发布的一期
        $issue = Issue::unpublished()->first();
        // 没有的话中断
        if (!count($issue)) {
            $this->error('请先创建 Issue!');
            exit();
        }
        // 确认一下
        if (!$this->confirm('你将发送周刊给所有用户，请确定? [y|N]')) {
            $this->info('取消发送！');
            exit();
        }

        // 取出周刊数据
        $posts = $issue->getUnissuedPosts();
        $links = $issue->getUnissuedLinks();
        $view = view('emails.weekly_issue', compact('issue', 'posts', 'links'));
        $contents = $view->render();

        // 发布到 sendcloud 上
        $client = new Client();
        try {
            $response = $client->post('http://api.sendcloud.net/apiv2/mail/send', [
                'form_params' => [
                    'apiUser' => config('services.sendcloud.apiuser'),
                    'apiKey'  => config('services.sendcloud.apikey'),
                    'from'    => 'Laravel资讯<noreply@laravel-china.org>',
                    'to'      => config('services.sendcloud.address_list'),
                    'useAddressList'   => 'true',
                    'subject' => $issue->name,
                    'html'    => $contents,
                ]
            ]);

            $issue->is_published = 'yes';
            $issue->save();

            Post::unissued()->update([
                'issue_id' => $issue->id
            ]);

            Link::unissued()->update([
                'issue_id' => $issue->id
            ]);

            $this->info('发送成功');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            dd($response);
        }
    }
}
