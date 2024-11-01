<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    public function userSim()
    {
        return $this->hasOne(UserSim::class,'sim_id','id');
    }

}
