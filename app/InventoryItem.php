<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InventoryItem extends Model
{
    protected $with = ['player'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function addToRoster()
    {
        $this->in_team = 1;
        return $this->save();
    }

    public function removeFromRoster()
    {
        $this->in_team = 0;
        return $this->save();
    }

    public function sell()
    {
        // delete invent item
        $result = $this->delete();

        // update balance if success
        if ($result) {
            $amount = ($this->player->rating * 50);
            if ($this->player->type != "normal") {
                $amount += 1000;
            }
    
            $user = Auth::user();
            $user->tokens = round($user->tokens + $amount);

            return $user->save();
        } else {
            throw Exception('Something went wrong!');
        }       
    }
}
