<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id','amount','trx_id','purpose','payment_type', 'status', 'payment_method', 'is_premium'];
}
