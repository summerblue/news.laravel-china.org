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

        Post::unissued()->update([
            'issue_id' => $issue->id
        ]);

        Link::unissued()->update([
            'issue_id' => $issue->id
        ]);
    }
}
