<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Link;

class TopicToLinkCommand extends Command
{
    protected $signature = 'links:collect {topic_id} {--cid=}';

    protected $description = '收集 LC 的文章并转换为 Link - links:collect 1 --cid=2';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $topic_id = $this->argument('topic_id');
        $cid = $this->option('cid');

        $client = new Client();
        $response = $client->get("https://api.phphub.org/v1/topics/$topic_id?include=user", [
            'headers' => [
                'Accept' => 'application/vnd.OralMaster.v1+json',
                'Authorization' => 'Bearer ' . config('app.lc_token'),
            ]
        ]);

        $result = json_decode($response->getBody(), true);
        $topic = $result['data'];
        $user = $topic['user']['data'];

        if (Link::where('title', $topic['title'])->count() > 0) {
            $this->error("已经添加过：" . $topic['title']);
            exit;
        }

        $link = new Link;
        $link->title = $topic['title'];
        $link->link = "https://laravel-china.org/topics/$topic_id";
        $link->user_name = $user['name'];
        $link->user_link = "https://laravel-china.org/users/" . $user['id'];
        $link->category_id = $cid;
        $link->save();

        $this->info("文章：" . $link->title);
        $this->info("分类：" . $link->Category->name);
    }


}
