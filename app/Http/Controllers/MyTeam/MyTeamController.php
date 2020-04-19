<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

class MyTeamController extends Controller
{
    public function index()
    {
        $players = Player::all()->take(50);
        $players_data = [];
        foreach($players as $player) {
            $players_data[] = [
                'id' => $player->hltv_id,
                'name' => $player->name,
                'rating' => $player->rating,
                'headshots' => $player->headshots,
                'kpr' => $player->headshots
            ];
        }

        return view('pages.myteam.index', [
            'players_card_data' => $players_data,
        ]);
    }
}
