<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\InventoryItem;
use App\Player;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeamController extends Controller
{
    public function index()
    {
        return view('pages.myteam.index', [
            'inventory' => Auth::user()->inventory,
        ]);
    }

    public function getInventory()
    {
        return Auth::user()->inventory;
    }

    public function addOrRemoveFromRoster(Request $request)
    {
        $inventory_item = $this->getUsersItem($request->id);
        
        if ($inventory_item->in_team) {
            $inventory_item->removeFromRoster();
            return 0;
        } else {
            $inventory_item->addToRoster();
            return 1;
        }
    }

    private function getUsersItem($player_id)
    {
        $item = InventoryItem::where('player_id', $player_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$item) {
            throw new Exception('Unable to find users inventory item');
        }

        return $item;
    }
}
