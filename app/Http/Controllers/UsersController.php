<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Cache;
use Auth;
use Flash;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\SendActivateMail;

class UsersController extends Controller
{
    public function __construct()
    {

    }

    public function show($id)
    {
		$user = User::findOrFail($id);
		$posts = Post::where('user_id', $id)->with('user', 'category')->recent()->get();

		return view('users.show', compact('user', 'posts'));
    }
}
