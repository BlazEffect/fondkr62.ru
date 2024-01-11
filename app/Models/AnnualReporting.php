<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualReporting extends Model
{
    use HasFactory;

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
