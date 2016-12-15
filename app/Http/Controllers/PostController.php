<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::recent()->paginate(10);

		return view('posts.index', compact('posts'));
	}

	public function show($id)
	{
		$post = Post::where('id', $id)->with('user', 'category')->first();
        $posts = Post::recent()->paginate(3);

		return view('posts.show', compact('post', 'posts'));
	}
}
