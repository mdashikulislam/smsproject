<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSim extends Model
{
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
