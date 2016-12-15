<?php namespace App\Handlers\Sitemap;

use Illuminate\Routing\UrlGenerator;
use App\Models\Post;

class DataProvider
{
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Routing\UrlGenerator
     */
    protected $url;
    protected $posts;

    public function __construct(UrlGenerator $url, Post $posts)
    {
        $this->url    = $url;
        $this->posts = $posts;
    }


    public function getPosts()
    {
        return $this->posts->limit(100)->orderBy('id', 'desc')->get();
    }

    public function getPostUrl($post)
    {
        return $this->url->route('posts.show', $post->id);
    }


    public function getStaticPages()
    {
        $static = [];

        // $static[] = $this->getPage('home', 'daily', '1.0');
        // $static[] = $this->getPage('topics.index', 'daily', '1.0');
        // $static[] = $this->getPage('about', 'monthly', '0.7');

        // $static[] = $this->getPage('users.index', 'weekly', '0.8');

        return $static;
    }

    protected function getPage($route, $freq, $priority)
    {
        $url = $this->url->route($route);

        return compact('url', 'freq', 'priority');
    }
}
