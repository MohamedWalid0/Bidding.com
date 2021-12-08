<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

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
        'deadline' => 'datetime'
    ];

    protected $appends = ['last_bid'];

    // Relations
    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class , 'product_wishlists')->withTimestamps();
    }

    // public function productInWishlist($productId)
    // {
    //     $wishlist = new Wishlist() ;
    //     // dd($wishlist->user()) ;
    //     $wishlistId = Wishlist::where('user_id' , Auth::id() );
    //     return ($wishlistId ) ;
    //     $user = new User() ;
    //     return $user->wishlist()->wishlists()->where('product_id', $productId)->exists();
    // }

    public function user_bids()
    {
        return $this->belongsToMany(User::class , 'bids')
            ->withPivot('cost')
            ->as('user_bids')
            ->withTimestamps();
    }


    // Scopes
    public function scopeLatestProducts(Builder $query ,int $take): Builder
    {
        return $query->latest()->take($take);
    }
    // Scopes
    public function scopeHottestProducts(Builder $query ,int $take): Builder
    {
        return $query->withCount('user_bids')
            ->orderByDesc('user_bids_count')
            ->limit($take);
    }

    public function getLastBidAttribute()
    {
        return $this->user_bids->last()->user_bids;
    }

}
