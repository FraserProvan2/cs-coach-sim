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

        return view('pages.myteam.index', [
            'players' => $players,
        ]);
    }
}
