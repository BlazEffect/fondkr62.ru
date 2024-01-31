<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailReceipt extends Model
{
    protected $primaryKey = 'Ls';

    public $timestamps = false;

    protected $fillable = [
        'Ls',
        'Email',
        'From',
        'Adres',
        'Phone',
        'AdresPom',
        'File',
        'Created',
    ];

    protected $casts = [
        'Created' => 'datetime',
    ];
}
