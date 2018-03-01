<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    public function post($id, Request $request) {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::user()->id,
            'content' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Comment has been added.');
    }

    public function edit($id) {
        $comment = Comment::find($id);
        if(!$comment || $comment->user_id != Auth::user()->id) {
            return redirect()->route('index');
        }
        return View::make('comments.edit')->with('comment', $comment);
    }

    public function update($id, Request $request) {
        if($request->user_id != Auth::user()->id) {
            return redirect()->route('index');
        }

        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->content = $request->comment;
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment has been updated.');
    }
}