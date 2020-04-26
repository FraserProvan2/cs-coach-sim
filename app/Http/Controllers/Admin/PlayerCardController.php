<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

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
        dd($request->all());
    }

    public function updateImage(Request $request, $id)
    {
        dd($request->all());
    }

    public function destroy($id)
    {
        dd($id);
    }
}
