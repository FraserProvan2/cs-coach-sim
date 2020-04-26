<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use Sortable;

    protected $table = 'players';

    protected $guarded = [];

    public $sortable = ['id', 'name', 'type'];
}
