<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Post;
use App\Comment;
use App\User;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
       $categories = Category::all();
       
       return View::make('admin.categories.index')
                ->with('categories', $categories);
    }
    
    public function create() {
        return view('admin.categories.create');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
         'category_name' => 'required|min:4|max:100',
        ]);
        
        $category_name = $request->category_name; 
        
        Category::create(['category_name'=>$category_name]);
        
        return redirect()->route('admin.categories')->with('success', 'Category has been created.');
    }
    
    public function edit($id) {
        $category = Category::find($id);
        
        return View::make('admin.categories.edit')
                ->with('category',$category);
    }
    
    public function update($id, Request $request) {
        $this->validate($request, [
         'category_name' => 'required|min:4|max:100',
        ]);
         
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        
        $category->save();
         
        return redirect()->route('admin.categories')->with('success', 'Category has been updated.');
    }
    
    public function destroy($id) {
        $category = Category::find($id);
        
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Category has been deleted.');
    }
}
