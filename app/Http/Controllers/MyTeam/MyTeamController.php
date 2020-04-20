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

    /**
     * Roster methods
     */

    public function getRoster()
    {
        $roster = InventoryItem::where('user_id', Auth::user()->id)
            ->where('in_team', 1)
            ->get();

        // ensure roster is valid
        if (count($roster) !== 5) {
            return false;
        }

        return $roster;
    }

    public function getRosterAmount()
    {
        $roster = InventoryItem::where('user_id', Auth::user()->id)
            ->where('in_team', 1)
            ->get();

        return count($roster);
    }

    public function addOrRemoveFromRoster(Request $request)
    {
        $inventory_item = $this->getUsersItem($request->id);
        
        if ($inventory_item->in_team) {
            $inventory_item->removeFromRoster();
            return 0;
        } else {
            if($this->getRosterAmount() >= 5) {
                return response('You already have 5 players in your roster', 400);
            }
            
            $inventory_item->addToRoster();
            return 1;
        }
    }
}
