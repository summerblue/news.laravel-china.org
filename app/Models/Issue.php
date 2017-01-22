<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded = ['id'];

    public function scopeUnpublished($query)
    {
        return $query->where('is_published', 'no');
    }

    public function getUnissuedPosts()
    {
        $posts['news_posts'] = Post::issuePostsByCid(1);
        $posts['tutorials_posts'] = Post::issuePostsByCid(2);
        $posts['packages_posts'] = Post::issuePostsByCid(3);
        $posts['resources_posts'] = Post::issuePostsByCid(4);
        $posts['meetup'] = Post::issuePostsByCid(6);
        return $posts;
    }
    public function getIsuuePosts()
    {
        $posts['news_posts'] = Post::issuePostsByCid(1, $this->id);
        $posts['tutorials_posts'] = Post::issuePostsByCid(2, $this->id);
        $posts['packages_posts'] = Post::issuePostsByCid(3, $this->id);
        $posts['resources_posts'] = Post::issuePostsByCid(4, $this->id);
        $posts['meetup'] = Post::issuePostsByCid(6, $this->id);
        return $posts;
    }
}
