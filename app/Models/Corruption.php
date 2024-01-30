<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corruption extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'F',
        'I',
        'O',
        'Email',
        'Adres',
        'Theme',
        'Message',
        'Sogl',
        'Created',
    ];
}
