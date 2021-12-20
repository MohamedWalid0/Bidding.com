<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductWishlist extends Pivot
{
    use HasFactory;

    protected $table = 'product_wishlists';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }



}
