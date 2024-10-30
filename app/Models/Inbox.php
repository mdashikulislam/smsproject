<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = ['hash_id','from_no','message','route','rec_time','imsi','phone_number','is_deleted'];
}
