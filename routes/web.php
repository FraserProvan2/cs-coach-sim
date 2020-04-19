<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*-------------------------------------------------------------------------
| Core Routes
|-------------------------------------------------------------------------*/

Auth::routes();

Route::get('/landing', 'Landing\LandingPageController@index')->name('landing');

Route::group(['middleware' => ['auth']], function () {
    // Play routes
    Route::get('/', function () {
        return redirect('/play');
    });
    Route::get('/play', 'Play\PlayController@index')->name('play');

    // My Team routes
    Route::get('/my-team', 'MyTeam\MyTeamController@index')->name('my-team');
    Route::get('/my-team/fetch', 'MyTeam\MyTeamController@getInventory');

        // team management
        Route::post('/my-team/add-or-remove', 'MyTeam\MyTeamController@addOrRemoveFromRoster');
});

/*-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------*/

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', 'Admin\AdminController@index');
});
