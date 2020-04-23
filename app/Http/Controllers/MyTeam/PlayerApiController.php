<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

class PlayerApiController extends Controller
{
    public function addOrUpdate(Request $request)
    {
        $player = Player::find($request->id);
        
        // UPDATE
        if ($player) {
            $player->team = $request->team;
            $player->age = $request->age;
            $player->rating = $request->rating;
            $player->headshots = $request->headshots;
            $player->kd_ratio = $request->kd_ratio;
            $player->kpr = $request->kpr;
            $player->dpr = $request->dpr;
            $result = $player->save();

            if ($result) {
                return response($player->name . " has been updated");
            } else {
                return response("error updating " . $player->name, 400);
            }
        }
        // ADD
        else {
            $player = new Player($request->all());
            $result = $player->save();

            if ($result) {
                return response($player->name . " has been added");
            } else {
                return response("error adding " . $player->name, 400);
            }
        }
    }
}
