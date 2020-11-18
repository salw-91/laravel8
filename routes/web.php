<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/test', function () {
//     return 'test';
// });

// Shop
Route::resource('shop', 'ShopController');
Route::get('product/soft/delete/{id}', 'ShopController@softDeletes')->name('soft.delete');
Route::get('product/trash', 'ShopController@trashedProducts')->name('shop.trash');
Route::get('product/return/trash/{id}', 'ShopController@ReturnFromSoftDeletes')->name('shop.return.trash');
Route::get('product/hard/delete/{id}', 'ShopController@hardDeletes')->name('shop.hard.delete');

//Profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/update', 'ProfileController@update')->name('profile.update');

//Post
Route::resource('/posts', 'PostController');
Route::get('post/soft/delete/{id}', 'PostController@softDeletes')->name('post.soft.delete');
Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::get('/post/harddelete/{id}', 'PostController@harddelete')->name('post.harddelete');

//Tag
Route::get('/tags', 'TagController@index' )->name('tags');
Route::get('/tag/create', 'TagController@create' )->name('tag.create');
Route::post('/tag/store', 'TagController@store' )->name('tag.store');
Route::get('/tag/edit/{id}', 'TagController@edit' )->name('tag.edit');
Route::post('/tag/update/{id}', 'TagController@update' )->name('tag.update');
Route::get('/tag/destroy/{id}', 'TagController@destroy' )->name('tag.destroy');


//User
Route::get('/users', 'UserController@index' )->name('users');
Route::get('/user/create', 'UserController@create' )->name('user.create');
Route::post('/user/store', 'UserController@store' )->name('user.store');
Route::get('/user/edit/{id}', 'UserController@edit' )->name('user.edit');
Route::post('/user/update/{id}', 'UserController@update' )->name('user.update');
Route::get('/user/destroy/{id}', 'UserController@destroy' )->name('user.destroy');
