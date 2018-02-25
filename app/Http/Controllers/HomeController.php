<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
       $posts = Post::withCount('comments')
               ->join('categories', 'posts.category_id', '=', 'categories.id')
               ->join('users', 'users.id', '=', 'posts.user_id')
               ->select('posts.id', 'categories.id as cId', 'categories.category_name', 'posts.title', 'posts.content', 'posts.created_at', 'posts.updated_at', 'users.name')
               ->orderBy('posts.id', 'desc')
               ->paginate(4);     
       
       $categories = Category::all();
       
       return View::make('index')
                ->with('posts', $posts)
                ->with('categories', $categories);
    }
}
