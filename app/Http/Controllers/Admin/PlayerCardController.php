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
        return view('admin.player-cards.create', [
            'card_types' => config('custom.cardTypes')
        ]);
    }

    public function store(Request $request)
    {
        $this->validatePlayer();
        request()->validate(['id' => 'required']);

        $player = new Player($request->all());
        $player->id = '9900' . $request->id;
        $player->save();

        return redirect('/admin/players/9900' . $request->id);
    }

    public function edit($id)
    {
        return view('admin.player-cards.edit', [
            'player' => Player::find($id),
            'card_types' => config('custom.cardTypes')
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validatePlayer();

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

    private function validatePlayer()
    {
        return request()->validate([
            'name' => ['required'],
            'type' => ['required'],
            'age' => ['required', 'numeric'],
            'nationality' => ['required'],
            'rating' => ['required', 'numeric'],
            'headshots' => ['required'],
            'kd_ratio' => ['required', 'numeric'],
            'kpr' => ['required', 'numeric'],
            'dpr' => ['required', 'numeric'],
        ]);
    }
}
