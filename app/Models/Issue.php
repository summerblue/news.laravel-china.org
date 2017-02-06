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
        $posts['news'] = Post::issuePostsByCid(1);
        $posts['tutorials'] = Post::issuePostsByCid(2);
        $posts['packages'] = Post::issuePostsByCid(3);
        $posts['resources'] = Post::issuePostsByCid(4);
        $posts['meetup'] = Post::issuePostsByCid(6);
        $posts['community'] = Post::issuePostsByCid(8);
        return $posts;
    }

    public function getIsuuePosts()
    {
        $posts['news'] = Post::issuePostsByCid(1, $this->id);
        $posts['tutorials'] = Post::issuePostsByCid(2, $this->id);
        $posts['packages'] = Post::issuePostsByCid(3, $this->id);
        $posts['resources'] = Post::issuePostsByCid(4, $this->id);
        $posts['meetup'] = Post::issuePostsByCid(6, $this->id);
        $posts['community'] = Post::issuePostsByCid(8, $this->id);
        return $posts;
    }

    // Links

    public function getUnissuedLinks()
    {
        $posts['news'] = Link::byCid(1);
        $posts['tutorials'] = Link::byCid(2);
        $posts['packages'] = Link::byCid(3);
        $posts['resources'] = Link::byCid(4);
        $posts['meetup'] = Link::byCid(6);
        $posts['community'] = Link::byCid(8);
        return $posts;
    }

    public function getIsuueLinks()
    {
        $posts['news'] = Link::byCid(1, $this->id);
        $posts['tutorials'] = Link::byCid(2, $this->id);
        $posts['packages'] = Link::byCid(3, $this->id);
        $posts['resources'] = Link::byCid(4, $this->id);
        $posts['meetup'] = Link::byCid(6, $this->id);
        $posts['community'] = Link::byCid(8, $this->id);
        return $posts;
    }
}
