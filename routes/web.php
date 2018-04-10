<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/welcome/admin');

Route::namespace('Admin')->name('welcome.')->prefix('welcome')->group(function () {
    Route::get('/admin', 'WelcomeController@welcome')->name('admin');
    Route::get('/mindaugas', 'WelcomeController@welcome')->name('mindaugas');
    Route::get('/ignas', 'WelcomeController@welcome')->name('ignas');
});
