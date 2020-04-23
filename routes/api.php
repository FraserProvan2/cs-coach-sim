<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*------------------------------------------------------------------------
| API Routes
|-------------------------------------------------------------------------*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('player/add-or-update', 'MyTeam\PlayerApiController@addOrUpdate');
Route::get('player/check-missing-images', 'MyTeam\PlayerApiController@checkForMissingPlayerImages');
