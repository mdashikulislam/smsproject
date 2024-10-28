<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SingleService extends Model
{
    protected $fillable = ['name','price','from_filter','message_filter','is_other_site','status'];
}
