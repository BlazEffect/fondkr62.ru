<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    public function selectionLot()
    {
        return $this->belongsTo(SelectionsLot::class, 'IdSelection', 'IdSelection');
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'Oid', 'OidLot');
    }
    public function elementsHouse()
    {
        return $this->hasMany(LotsElementsHouse::class, 'OidLot', 'OidLot');
    }
}
