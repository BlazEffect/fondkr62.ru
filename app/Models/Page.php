<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'url',
        'active',
        'content',
        'section_name'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field, $value)->where('active', true)->firstOrFail();
    }
}
