<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index')->name('home');

/** Admin groupsas */
Route::namespace('Admin')->prefix('/admin')->as('admin.')->group(function () {

    Route::get('/posts/stats', 'PostsController@stats');
    Route::resource('/posts', 'PostsController');
});
