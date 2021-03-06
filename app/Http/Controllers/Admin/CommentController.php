<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::all();
        return View::make('admin.comments.index')->with('comments', $comments);
    }

    public function create() {
        $users = User::select('id', 'name')->get();
        $posts = Post::select('id', 'title')->get();
        return view('admin.comments.create')->with('users', $users)->with('posts', $posts);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'post' => 'required',
            'user' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
           'post_id' => $request->post,
           'user_id' => $request->user,
           'content' => $request->comment
        ]);

        return redirect()->route('admin.comments')->with('success', 'Comment has been CREATED.');
    }

    public function edit($id) {
        $comment = Comment::find($id);

        if (empty($comment)){
            return redirect()->route('admin.comments');
        }

        $users = User::select('id', 'name')->get();
        $posts = Post::select('id', 'title')->get();

        if (empty($posts)){
            return redirect()->route('admin.comments');
        }

        return View::make('admin.comments.edit')->with('comment', $comment)->with('users', $users)->with('posts', $posts);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'post' => 'required',
            'user' => 'required',
            'comment' => 'required'
        ]);

        $comment = Comment::find($id);

        if (empty($comment)){
            return redirect()->route('admin.comments');
        }

        $comment->post_id = $request->post;
        $comment->user_id = $request->user;
        $comment->content = $request->comment;
        $comment->save();

        return redirect()->route('admin.comments')->with('success', 'Comment has been UPDATED.');
    }

    public function destroy($id) {
        $comment = Comment::find($id);

        if (empty($comment)){
            return redirect()->route('admin.comments');
        }

        $comment->delete();
        return redirect()->route('admin.comments')->with('success', 'Comment has been DELETED.');
    }
}
