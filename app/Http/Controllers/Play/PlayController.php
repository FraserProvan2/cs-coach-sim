<?php

namespace App\Http\Controllers\Play;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index()
    {
        return view('pages.play.index');
    }
}
