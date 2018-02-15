<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Post;
use App\Comment;
use App\User;

class PostController extends Controller
{
    public function __construct() {
        // TODO: Add middleware to check access
    }
    
    public function index() {
        
    }
    
    public function create() {
        return view(posts.create);
    }
}