<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
