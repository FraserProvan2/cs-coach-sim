<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function card()
    {
        return $this->belongsTo('App\Player');
    }
}
