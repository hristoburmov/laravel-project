<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{    
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
            'title' => 'required|min:4|max:100',
            'content' => 'required'
        ]);

        Post::create([
           'category_id' => $request->category,
           'user_id' => Auth::user()->id,
           'title' => $request->title,
           'content' => $request->content
        ]);

        return redirect()->route('admin.posts')->with('success', 'Post has been created.');
    }
    
    public function edit($id) {
        $post = Post::find($id);

        if (empty($post)){
            return redirect()->route('admin.posts');
        }

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
            'title' => 'required|min:4|max:100',
            'content' => 'required'
        ]);

        $post = Post::find($id);

        if (empty($post)){
            return redirect()->route('admin.posts');
        }

        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('admin.posts')
                ->with('success', 'Post has been updated.');
    }

    public function destroy($id) {
        $post = Post::find($id);

        if (empty($post)){
            return redirect()->route('admin.posts');
        }

        $post->delete();
        
        return redirect()->route('admin.posts')
                ->with('success', 'Post has been deleted.');
    }
}
