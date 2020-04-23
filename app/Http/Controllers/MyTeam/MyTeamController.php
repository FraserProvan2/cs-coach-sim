<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\InventoryItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeamController extends Controller
{
    public function index()
    {
        return view('pages.myteam.index', [
            'inventory' => $this->getInventory(),
        ]);
    }

    public function getInventory()
    {
        return InventoryItem::where('user_id', Auth::user()->id)
            ->orderBy('in_team', 'desc')
            ->get();
    }

    public function getSynergy()
    {
        return Synergy::calculate();
    }

    public function sellPlayer(Request $request)
    {
        $item = InventoryItem::findOrFail($request->id);
        $result = $item->sell();

        // if ($result) {
        //     return
        // }

        // return
    }
}
