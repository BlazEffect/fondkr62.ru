<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortTermPlan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'documents',
        'early-documents',
    ];

    protected $casts = [
        'documents' => 'array',
        'early-documents' => 'array',
    ];
}
