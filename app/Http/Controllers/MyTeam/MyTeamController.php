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
            return response('Roster not full', 400);
        }

        return [
            'roster' => $roster,
            'synergy' => $this->getSynergy()
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

    /**
     * Synergy methods
     */

    public function getSynergy()
    {

        $roster = InventoryItem::where('user_id', Auth::user()->id)
            ->where('in_team', 1)
            ->get();

        $score = 0;
        foreach($roster as $item) {
            foreach($roster as $item_to_compare) {
                if ($item->id !== $item_to_compare->id) {
                    if ($item->player->team === $item_to_compare->player->team) {
                        $score += 1;
                    } else if ($item->player->nationality === $item_to_compare->player->nationality) {
                        $score += 2;
                    }
                }
            }
        }

        $max_score = 10;
        $calculated = (($score / $max_score) * 100);
        if ($calculated > 100) {
            return 100;
        }
        
        return round($calculated);
    }
}
