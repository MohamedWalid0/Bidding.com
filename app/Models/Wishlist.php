<?php

namespace App\Models;

use App\Scopes\WishlistUserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded =[];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_wishlists')->withTimestamps();
    }

    // Scopes
    protected static function booted()
    {
        static::addGlobalScope(new WishlistUserScope);
    }
}
