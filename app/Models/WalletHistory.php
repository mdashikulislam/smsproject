<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    protected $fillable = ['user_id','old_balance','present_balance','cost','description'];
}
