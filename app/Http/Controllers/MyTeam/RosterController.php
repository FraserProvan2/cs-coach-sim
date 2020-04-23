<?php

namespace App\Http\Controllers\MyTeam;

use App\Http\Controllers\Controller;
use App\InventoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RosterController extends Controller
{
    public function getRoster()
    {
        $roster = InventoryItem::where('user_id', Auth::user()->id)
            ->where('in_team', 1)
            ->get();

        // ensure roster is valid
        if (count($roster) !== 5) {
            return response('Roster not full', 400);
        }

        return [
            'roster' => $roster,
            'synergy' => Synergy::calculate()
        ];
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
        $inventory_item = InventoryItem::where('player_id', $request->id)
            ->where('user_id', Auth::user()->id)
            ->first();
        
        if (!$inventory_item) {
            throw new Exception('Unable to find users inventory item');
        }
        
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
