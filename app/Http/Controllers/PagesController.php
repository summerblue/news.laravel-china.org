<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Rss;

use App\Models\Category;
use App\Models\Post;

class PagesController extends Controller
{
    public function home()
    {
		$posts['news_posts'] = Post::where('category_id', 1)->recent()->limit(3)->get();
		$posts['tutorials_posts'] = Post::where('category_id', 2)->recent()->limit(3)->get();
		$posts['packages_posts'] = Post::where('category_id', 3)->recent()->limit(3)->get();
		$posts['resources_posts'] = Post::where('category_id', 4)->recent()->limit(3)->get();
		$posts['meetup'] = Post::where('category_id', 6)->recent()->limit(3)->get();

        $big_banner = Post::where('position', 'big_banner')->recent()->first();
        $side_banner = Post::where('position', 'side_banner')->recent()->limit(3)->get();

        return view('home', compact('posts', 'big_banner', 'side_banner'));
    }

    public function feed()
    {
        // @TODO by Monkey 这是一个范例
        $channel =[
            'title'       => 'Basic Framework',
            'description' => 'Basic Framework 是 ESTGroup 团队项目开发的基础框架',
            'link'        => url(route('feed')),
        ];

        $feed = Rss::feed('2.0', 'UTF-8');

        $feed->channel($channel);

        $posts = Post::orderBy('created_at', 'desc')->limit(20)->get();
        foreach ($posts as $post) {
            $feed->item([
                'title'             => $post->name,
                'description|cdata' => str_limit($post->body, 200),
                'link'              => route('posts.show', [$post->id]),
                'pubDate'           => date('Y-m-d', strtotime($post->created_at)),
                ]);
        }

        return response($feed, 200, array('Content-Type' => 'text/xml'));
    }

    public function sitemap()
    {
        return app('App\Handlers\Sitemap\Builder')->render();
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        return redirect()->away('https://www.bing.com/search?q=site:news.laravel-china.org ' . $query, 302);
    }
}
