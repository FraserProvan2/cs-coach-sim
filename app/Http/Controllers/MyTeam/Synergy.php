<?php

namespace App\Http\Controllers\MyTeam;

use App\InventoryItem;
use Illuminate\Support\Facades\Auth;

class Synergy
{
    public static function calculate()
    {
        $roster = InventoryItem::where('user_id', Auth::user()->id)
            ->where('in_team', 1)
            ->get();

        $score = 0;
        foreach ($roster as $item) {
            foreach ($roster as $item_to_compare) {
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
