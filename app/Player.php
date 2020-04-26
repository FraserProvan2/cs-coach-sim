<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use Sortable;

    protected $table = 'players';
    protected $guarded = [];
    protected $appends = ['value'];
    public $sortable = ['id', 'name', 'type'];

    public function getValueAttribute()
    {
        $base = 50;
        $sell_value = 50;

        if ($this->type === 'normal') {
            $sell_value = ($base * $this->rating);
        } 
        else if ($this->type === 'historic') {
            $sell_value = ($base * ($this->rating * 25));
        }

        return round($sell_value);
    }
}