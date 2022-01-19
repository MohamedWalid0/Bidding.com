<?php

namespace App\Models;

use App\Scopes\ProductScope;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes ;
    protected $dates = ['deleted_at'];


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


    // protected $with = ['user_bids'];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Wishlist::class, 'product_wishlists')
            ->withTimestamps();
    }


    public function user_bids(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bids')
            ->using(Bid::class)
            ->withPivot('cost')
            ->as('bid')
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

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function propertiesValues(): BelongsToMany
    {
        return $this->belongsToMany(PropertyValue::class, 'product_properties', 'product_id', 'property_value_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphToMany(User::class, 'likeable', 'reactions')
            ->using(Reaction::class)
            ->withPivot('value')
            ->as('like')
            ->withTimestamps();
    }

    public function dislikes()
    {
        return $this->morphToMany(User::class, 'likeable', 'reactions')
            ->using(Reaction::class)
            ->withPivot('value')
            ->as('like')
            ->withTimestamps();
    }

    public function reports():HasMany
    {
        return $this->HasMany(ReportProduct::class) ;
    }

    public function stopped_product(): HasOne
    {
        return $this->hasOne(StoppedProduct::class, 'product_id');
    }

    // Scopes
    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }

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
        return $this->user_bids->sortByDesc('bid.updated_at')->first();
    }

    public function getHotUsersAttribute()
    {
        return $this->load('user_bids.account')->user_bids->load('images')->sortByDesc('bid.updated_at')->take(5);
    }

}
