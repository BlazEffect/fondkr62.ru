<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'active',
        'content',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field, $value)->where('active', true)->firstOrFail();
    }
}
