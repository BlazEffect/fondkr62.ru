<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortTermPlan extends Model
{
    use HasFactory;

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
