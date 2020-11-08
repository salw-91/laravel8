<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
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
