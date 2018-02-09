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


// Admin
Route::group(['namespace'=>'Admin','prefix'=>'admin'], function() { // TODO: Add Middlware to chek access
    Route::get('/', function() {
    return view('admin.admincp');
    })->name('admincp'); 
    
    // Categories
    Route::get('categories', 'CategoryController@index')->name('admin.categories');
    Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create');
    Route::post('categories/create', 'CategoryController@store')->name('admin.categories.store');
    Route::get('categories/{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
    Route::put('/categories/update', 'CategoryController@update')->name('admin.categories.update');
    Route::delete('/categories/destroy/{id}', 'CategoryController@destroy')->name('admin.categories.destroy');
});