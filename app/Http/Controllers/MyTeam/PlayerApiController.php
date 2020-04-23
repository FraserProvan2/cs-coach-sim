<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerApiController extends Controller
{
    public function addOrUpdate(Request $request)
    {
        $player = Player::find($request->id);

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'team' => 'required',
            'age' => 'required',
            'nationality' => 'required',
            'rating' => 'required',
            'headshots' => 'required',
            'kd_ratio' => 'required',
            'kpr' => 'required',
            'dpr' => 'required',
        ]);
        
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

    public function checkForMissingPlayerImages()
    {
        $players = Player::all();
        $missing = [];
        foreach($players as $player) {
            $exists = Storage::exists('public/images/players/' . $player->id . '.png');
            if (!$exists) {
                $missing[] = $player->id;
            }
        }
        return $missing;
    }
}
