<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerCardController extends Controller
{
    public function index()
    {
        return view('admin.player-cards.index', [
            'players' => Player::all()[0]->sortable()->paginate(10)
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.player-cards.show', [
            'player' => Player::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'team' => ['required'],
            'age' => ['required', 'numeric'],
            'nationality' => ['required'],
            'rating' => ['required', 'numeric'],
            'headshots' => ['required'],
            'kd_ratio' => ['required', 'numeric'],
            'kpr' => ['required', 'numeric'],
            'dpr' => ['required', 'numeric'],
        ]);

        $player = Player::findOrFail($id);
        $player->update($request->all());
        
        return back();
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'playerImage' => 'required',
            'playerImage.*' => 'mimes:png'
        ]);

        $player_image = $request->file('playerImage');
        $image_name = $id . '.png';
        
        Storage::putFileAs('public/images/players/', $player_image, $image_name);

       return back();
    }
}
