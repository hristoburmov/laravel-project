<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Post;
use App\Comment;
use App\User;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct() {
        // TODO: Add middleware to check access
    }
    
    public function index() {
        $posts = Post::all();
        
        return View::make('admin.posts.index')
                ->with('posts', $posts);       
    }
    
    public function create() {
        $users = User::select('id', 'name')->get();
        $categories = Category::select('id', 'category_name')->get();
        
        return View::make('admin.posts.create')
                ->with('users', $users)
                ->with('categories', $categories);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'category' => 'required',
            'user' => 'required',
            'title' => 'required|min:4|max:100',
            'content' => 'required'
        ]);

        Post::create([
           'category_id' => $request->category,
           'user_id' => $request->user,
           'title' => $request->title,
           'content' => $request->content
        ]);

        return redirect()->route('admin.posts')->with('success', 'Post has been created.');
    }
    
    public function edit($id) {
        $post = Post::find($id);
        $users = User::select('id', 'name')->get();
        $categories = Category::select('id', 'category_name')->get();
        
        return View::make('admin.posts.edit')
                ->with('post', $post)
                ->with('users', $users)
                ->with('categories', $categories);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'category' => 'required',
            'user' => 'required',
            'title' => 'required|min:4|max:100',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $post->category_id = $request->category;
        $post->user_id = $request->user;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('admin.posts')
                ->with('success', 'Post has been updated.');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        
        return redirect()->route('admin.posts')
                ->with('success', 'Post has been deleted.');
    }
}