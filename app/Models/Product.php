<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class,'product_cart');
    }

    public function product_carts(): HasMany
    {
        return $this->hasMany(ProductCart::class);
    }
}
