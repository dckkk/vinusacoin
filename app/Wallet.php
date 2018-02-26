<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';

    protected $primaryKey = 'id';

    protected $fillable = ['user_email', 'token', 'total_coin', 'total_eth'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
