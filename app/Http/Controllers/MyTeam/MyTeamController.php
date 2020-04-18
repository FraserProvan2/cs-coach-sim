<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyTeamController extends Controller
{
    public function index()
    {
        return view('pages.myteam.index');
    }
}
