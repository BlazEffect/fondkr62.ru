<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotsElementsHouse extends Model
{
    use HasFactory;

    protected $table = 'lots_elements_house';

    public function elementHouse()
    {
        return $this->belongsTo(ElementsHouse::class, 'Oid', 'OidElementHouse');
    }
}
