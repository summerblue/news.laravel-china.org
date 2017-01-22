<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
    {
        $category = Category::find($request->input('category_id'));
        $categories = Category::all();
        return view('posts.create_edit', compact('categories', 'category'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->only('title','body_original','category_id','cover', 'excerpt');
        $data['user_id'] = Auth::id();
        $post = Post::create($data);

        return redirect(route('posts.show', $post->id));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $category = $post->category;

        return view('posts.create_edit', compact('post', 'categories', 'category'));
    }

    public function update($id, StorePostRequest $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only('title','body_original','category_id','cover'));

        return redirect(route('posts.show', $post->id));
    }

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
