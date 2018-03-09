<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentUser extends Model {
	
    protected $table = 'investment_user';
    protected $primaryKey = 'id';

    protected $fillable = ['user_email', 'paket_name', 'total_deposit', 'total_reward', 'join_date', 'reward_date', 'expired_date'];
}
