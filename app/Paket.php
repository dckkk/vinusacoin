<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'min_deposit', 'max_deposit', 'contract', 'reward', 'sk'];
}
