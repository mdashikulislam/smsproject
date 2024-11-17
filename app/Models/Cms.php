<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable =['title','slug','image','content','seo_title','seo_description','seo_keyword','is_default'];
}
