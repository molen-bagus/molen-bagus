<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'category',
        'is_active'
    ];

    public function scopeActive($query)
{
    return $query->where('is_active', 1);
}
   
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this->price, 0, ',', '.');
    }
}
