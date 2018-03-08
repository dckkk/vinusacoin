<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'order_history';

    protected $primaryKey = 'id';

    protected $fillable = ['user_email', 'action', 'total', 'result', 'description', 'expired_date', 'transfer_need'];
}
