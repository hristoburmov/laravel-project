<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
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

        if (empty($category)){
            return redirect()->route('admin.categories');
        }
        
        return View::make('admin.categories.edit')
                ->with('category',$category);
    }
    
    public function update($id, Request $request) {
        $this->validate($request, [
         'category_name' => 'required|min:4|max:100',
        ]);

        if (empty($id)){
            return redirect()->route('admin.categories');
        }

        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        
        $category->save();
         
        return redirect()->route('admin.categories')->with('success', 'Category has been updated.');
    }
    
    public function destroy($id) {
        $category = Category::find($id);

        if (empty($category)){
            return redirect()->route('admin.categories');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Category has been deleted.');
    }
}
