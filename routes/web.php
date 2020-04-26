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
    Route::post('/my-team/sell-player', 'MyTeam\MyTeamController@sellPlayer');
    
        // roster management
        Route::get('/my-team/roster', 'MyTeam\RosterController@getRoster');
        Route::get('/my-team/roster/amount', 'MyTeam\RosterController@getRosterAmount');
        Route::post('/my-team/roster/add-or-remove', 'MyTeam\RosterController@addOrRemoveFromRoster');
        
        Route::get('/my-team/synergy', 'MyTeam\MyTeamController@getSynergy');

    // General
    Route::get('/tokens', 'TokenController@index');
        
});

/*-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------*/

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', 'Admin\AdminController@index');

    // Player Cards
    Route::get('/admin/players', 'Admin\PlayerCardController@index');
    Route::get('/admin/players/{player_id}', 'Admin\PlayerCardController@edit');
    Route::post('/admin/players/{player_id}/update', 'Admin\PlayerCardController@update');
    Route::post('/admin/players/{player_id}/update-image', 'Admin\PlayerCardController@updateImage');
    Route::get('/admin/players/{player_id}/update-image', 'Admin\PlayerCardController@updateImage');
    Route::delete('/admin/players/{player_id}/destroy', 'Admin\PlayerCardController@destroy');
});
