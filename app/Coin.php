<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model {
	
    protected $table = 'coin';
    protected $primaryKey = 'id';

    protected $fillable = ['total', 'stage_1', 'stage_2', 'stage_3'];
}
