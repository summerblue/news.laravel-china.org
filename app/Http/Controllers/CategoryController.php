<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function show($id)
	{
		$category = Category::findOrFail($id);
		// $posts = Post::where('category_id', $id)->with('user', 'category')->recent()->paginate(15);
		$posts = Post::where('category_id', $id)->with('user', 'category')->recent()->get();

		return view('categories.show', compact('category', 'posts'));
	}
}
