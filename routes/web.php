<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');

Route::get('/about', function() {
    return view('about');
})->name('about');

// Contact
Route::get('/contact', 'ContactController@showForm')->name('contact');
Route::post('/contact', 'ContactController@sendForm')->name('contact');

// Posts
Route::get('/post/{id}', 'PostController@show')->name('posts.show');
Route::get('/category/{category_id}', 'PostController@getByCategory')->name('posts.getByCategory');

// Users (guest only)
Route::group(['middleware' => 'guest'], function(){
	Route::view('login','auth.login')->name('login');
	Route::post('login','Auth\LoginController@Login');
	Route::view('register','auth.register')->name('register-user');
	Route::post('register','Auth\RegisterController@saveUser')->name('register-save');
});

// Registered User
Route::group(['middleware'=>'auth'], function() {
    //Logout
    Route::get('logout','Auth\LoginController@logout')->name('logout');

    // Comments
    Route::post('/post/{id}', 'CommentController@post')->name('comments.post');
    Route::get('/comment/{id}', 'CommentController@edit')->name('comments.edit');
    Route::post('/comment/{id}', 'CommentController@update')->name('comments.update');

    // Admin
    Route::group(['middleware' => 'adminCheck', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
        // Admin CP
	    Route::get('/', function() {
	        return view('admin.admincp');
	    })->name('admincp');

        // Categories
        Route::get('categories', 'CategoryController@index')->name('admin.categories');
        Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('categories/create', 'CategoryController@store')->name('admin.categories.store');
        Route::get('categories/{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
        Route::put('/categories/update/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::delete('/categories/destroy/{id}', 'CategoryController@destroy')->name('admin.categories.destroy');

        // Posts 
        Route::get('/posts', 'PostController@index')->name('admin.posts');
        Route::get('/posts/create', 'PostController@create')->name('admin.posts.create');
        Route::post('posts/create', 'PostController@store')->name('admin.posts.store');
        Route::get('posts/{id}/edit', 'PostController@edit')->name('admin.posts.edit');
        Route::put('/posts/update/{id}', 'PostController@update')->name('admin.posts.update');
        Route::delete('/posts/destroy/{id}', 'PostController@destroy')->name('admin.posts.destroy');

        // Comments
        Route::get('/comments', 'CommentController@index')->name('admin.comments');
        Route::get('/comments/create', 'CommentController@create')->name('admin.comments.create');
        Route::post('/comments/create', 'CommentController@store')->name('admin.comments.store');
        Route::get('/comments/edit/{id}', 'CommentController@edit')->name('admin.comments.edit');
        Route::put('/comments/update/{id}', 'CommentController@update')->name('admin.comments.update');
        Route::delete('/comments/destroy/{id}', 'CommentController@destroy')->name('admin.comments.destroy');
    });
});
