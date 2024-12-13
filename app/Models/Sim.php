<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Sim extends Model
{
    public function userSim()
    {
        return $this->hasOne(UserSim::class,'sim_id','id');
    }

    public function  getNetworkTypeNameAttribute($value)
    {
        return getNetworkType($this->network_type);
    }

    public function inboxes()
    {
        return $this->hasMany(Inbox::class,'imsi','imsi');
    }
}
