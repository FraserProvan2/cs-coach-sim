<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*-------------------------------------------------------------------------
| Routes
|-------------------------------------------------------------------------*/

Auth::routes();

Route::get('/landing', 'Landing\LandingPageController@index')->name('landing');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/', 'Dashboard\DashboardController@index')->name('home');
});

/*-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------*/

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', 'Admin\AdminController@index');
});
