<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'total_users' => count(User::all()),
            'player_cards' => count(Player::all()),
        ]);
    }
}
