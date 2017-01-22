<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Issue;
use App\Models\Post;
use Illuminate\Http\Request;

use Auth;

class IssueController extends Controller {

	public function index()
	{
        if (Auth::check()) {
            $issues = Issue::orderBy('id', 'desc')->paginate(15);
        } else {
            $issues = Issue::where('is_published', 'yes')->orderBy('id', 'desc')->paginate(15);
        }

		return view('issues.index', compact('issues'));
	}

	public function show($id)
	{
		$issue = Issue::findOrFail($id);
        if ($issue->is_published == 'no' && !Auth::check()) {
            return response()->make('Unauthorized!', 403);
        }
        if ($issue->is_published == 'no') {
            $posts = $issue->getUnissuedPosts();
        } else {
            $posts = $issue->getIsuuePosts();
        }

		return view('issues.show', compact('issue', 'posts'));
	}
}
