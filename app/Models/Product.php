<?php

namespace App\Models;

use App\Casts\CostCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';


    protected $fillable = [
        'id' ,
        'name',
        'description',
        'location',
        'user_id',
        'sub_category_id',
        'start_price',
        'deadline',
        'status'
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    protected $appends = ['last_bid'];

    // Relations
    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Wishlist::class, 'product_wishlists')->withTimestamps();
    }


    public function user_bids(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bids')
            ->using(Bid::class)
            ->withPivot('cost')
            ->as('user_bids')
            ->withTimestamps();
    }


    // Scopes
    public function scopeLatestProducts(Builder $query, int $take): Builder
    {
        return $query->latest()->take($take);
    }

    public function scopeHottestProducts(Builder $query, int $take): Builder
    {
        return $query->withCount('user_bids')
            ->orderByDesc('user_bids_count')
            ->limit($take);
    }

    // Accessors
    public function getLastBidAttribute()
    {
        return $this->user_bids->last()?->user_bids;
    }

}
