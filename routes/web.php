<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index')->name('home');

/** Admin groupsas */
Route::namespace('Admin')->middleware(['auth'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/users/{user}/notify', 'UsersController@notify');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
});
