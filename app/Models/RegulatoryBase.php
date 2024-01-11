<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryBase extends Model
{
    use HasFactory;

    protected $table = 'regulatory_base';

    protected $fillable = [
        'name',
        'slug',
        'documents',
        'section_name'
    ];

    protected $casts = [
        'documents' => 'array'
    ];
}
