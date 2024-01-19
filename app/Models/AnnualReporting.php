<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReporting extends Model
{
    protected $table = 'annual_reporting';

    protected $fillable = [
        'name',
        'slug',
        'documents',
    ];

    protected $casts = [
        'documents' => 'array'
    ];
}
