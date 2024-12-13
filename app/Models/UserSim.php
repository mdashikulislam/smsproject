<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserSim extends Model
{
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function sim()
    {
        return $this->hasOne(Sim::class,'id','sim_id');
    }

    public function getStatusLabelAttribute($value)
    {
        if (Carbon::parse($this->end_date)->isPast()) {
            return '<span class="badge bg-danger">Expired</span>';
        }
        return '<span class="badge bg-success">Active</span>';
    }

    public function scopeIsActive()
    {
        if (Carbon::parse($this->end_date)->isPast()) {
            return false;
        }
        return true;
    }
}
