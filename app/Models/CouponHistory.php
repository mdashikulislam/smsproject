<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponHistory extends Model
{
    protected $fillable = ['user_id','coupon_id'];
}
