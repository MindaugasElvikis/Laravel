<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', '/home');
Route::middleware(['auth'])->get('/home', 'HomeController@index')->name('home');

/** Admin groupsas */
Route::namespace('Admin')->middleware(['auth'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/users/{user}/notify', 'UsersController@notify');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
});

Route::middleware('membership:wood')->get('/messaging', 'MessagingController@index')->name('messaging.index');

Route::get('/memberships', 'MembershipsController@index')->name('memberships.index');
Route::get('/memberships/{membership}', 'MembershipsController@request')->name('memberships.request');
Route::get('/memberships/{membership}/pay', 'MembershipsController@processPayment')->name('memberships.payment.process');
