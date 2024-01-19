<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
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
