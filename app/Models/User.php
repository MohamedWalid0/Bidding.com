<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'rate',
        'oAuthToken'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function codes(): HasMany
    {
        return $this->hasMany(UserVerification::class, 'user_id');
    }

    public function account(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id');
    }

    public function wishlist(): HasOne
    {
        return $this->hasOne(Wishlist::class, 'user_id');
    }


    public static function productInWishlist($productId)
    {
        if (Auth::check()){
            $products =  auth()->user()->wishlist->products->pluck('id')->toArray() ;
            return in_array($productId, $products, true);
        }
        return false ;

    }
    public function product_bids(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'bids')
            ->using(Bid::class)
            ->withPivot('cost')
            ->as('user_bids')
            ->withTimestamps();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function product_likes()
    {
        return $this->morphedByMany(Product::class, 'likeable' , 'likes');
    }

    public function comment_likes()
    {
        return $this->morphedByMany(Comment::class, 'likeable' , 'likes');
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }
}
