<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code','max_uses','uses','start','expire','value','type','use_type','eligible'];

    public function couponUsers()
    {
        return $this->hasMany(CouponUser::class);
    }
}