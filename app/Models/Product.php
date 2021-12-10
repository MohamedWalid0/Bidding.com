<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

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

    public function click_events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'histories')
            ->wherePivot('event_id','=' , 1)
            ->withTimestamps();
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'histories')
            ->withTimestamps();
    }

    public function images()
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
        return $query->withCount('user_bids')
            ->orderByDesc('user_bids_count')
            ->limit($take);
    }

    public function scopeMostOfViewProducts(Builder $query, int $take): Builder
    {
        return $query->withCount('click_events')
            ->orderByDesc('click_events_count')
            ->limit($take);
    }



    /**
     * @throws \Throwable
     */
//    public function scopeMostOfViewProducts(Builder $query, int $take)
//    {
//        try {
//            DB::beginTransaction();
//            $eventId = Event::where('name', 'click')->first()->id;
//            $productsIds = DB::select(
//                DB::raw("
//                        SELECT product_id,
//                            COUNT(id)
//                            FROM histories
//                            WHERE event_id = $eventId
//                            GROUP BY  product_id
//                            ORDER BY COUNT(id) DESC
//                            LIMIT $take;
//                            ")
//            );
//
//            $arr = [];
//            foreach ($productsIds as $productId) {
//                array_push($arr, $productId->product_id);
//
//            }
//            $products = self::whereIn('id', $arr)->get();
//            DB::commit();
//            return $products;
//
//        } catch (\Throwable $th) {
//            DB::rollBack();
//            throw $th;
//        }
//    }

    public function getLastBidAttribute()
    {
        return $this->user_bids->last()?->user_bids;
    }

}
