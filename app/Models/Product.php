<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';


    protected $fillable = [
        'id',
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


    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'histories')
            ->withTimestamps();
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Scopes
    public function scopeLatestProducts(Builder $query, int $take): Builder
    {
        return $query->latest()->take($take);
    }

    public function scopeHottestProducts(Builder $query, int $take): Builder
    {
        return $query
            ->select('name', 'deadline', 'id')
            ->withCount('user_bids')
            ->orderByDesc('user_bids_count')
            ->limit($take);
    }


    public function scopeMostOfViewProducts(Builder $query, int $take): Builder
    {
        return $query
            ->select('name', 'deadline', 'id')
            ->withCount([
                'events' =>
                    fn($event) => $event->whereEventId(Event::CLICK)
            ])
            ->orderByDesc('events_count')
            ->limit($take);
    }


    public function getLastBidAttribute(): ?User
    {
        return Cache::remember('last_bid', now()->addDay(), function () {
            return $this->user_bids->sortByDesc('bids.created_at')->first();
        });
    }

}
