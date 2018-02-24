<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;
use App\Category;
use App\Post;
use App\Comment;
use App\User;


class PostController extends Controller
{
   public function show($id) {
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*')
                ->where('posts.id', '=', $id)->first();
        
        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                    ->where('comments.post_id', '=', $id)
                    ->select('comments.*','users.name as uName')->get();
        
        return View::make('posts.current')
                ->with('post',$post)
                ->with('comments', $comments);
   }

    public function comment($id, Request $request) {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => 1,
            'content' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Comment has been added.');
    }
   
   public function getByCategory($category_id) {
       $posts = Post::withCount('comments')
               ->join('categories', 'posts.category_id', '=', 'categories.id')
               ->join('users', 'users.id', '=', 'posts.user_id')
               ->select('posts.id', 'categories.id as cId', 'categories.category_name', 'posts.title', 'posts.content', 'posts.created_at', 'posts.updated_at', 'users.name')
               ->orderBy('posts.id', 'desc')
               ->where('posts.category_id', '=', $category_id)
               ->paginate(4);     
       
       $categories = Category::all();
       
       return View::make('index')
                ->with('posts', $posts)
                ->with('categories', $categories);
   }
}
