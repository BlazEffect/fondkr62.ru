<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'section_name',
        'content',
        'active',
        'url'
    ];
}
