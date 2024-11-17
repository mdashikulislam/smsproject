<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['title','slug','seo_title','seo_description','seo_keyword'];
}
