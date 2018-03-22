<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
