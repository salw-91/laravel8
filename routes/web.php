<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'test';
});

// Shop
Route::resource('shop', 'ShopController');
Route::get('shop/soft/delete/{id}', 'ShopController@softDeletes')
->name('soft.delete');

