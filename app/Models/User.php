<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
        'oAuthToken',
        'status' ,
        'phone_verified_at',
        'email_verified_at'
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
        'phone_verified_at' => 'datetime'
    ];

    public static function productInWishlist($productId)
    {
        if (Auth::check()) {
            $products = auth()->user()->wishlist->products->pluck('id')->toArray();
            return in_array($productId, $products, true);
        }
        return false;

    }

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

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
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
        return $this->morphedByMany(Product::class, 'likeable', 'reactions');
    }

    public function comment_likes()
    {
        return $this->morphedByMany(Comment::class, 'likeable', 'reactions');
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class );
    }



    public function block(): HasOne
    {
        return $this->hasOne(BlockUser::class, 'user_id');
    }




    public function block_admins():HasMany
    {
        return $this->HasMany(BlockUser::class , 'admin_id' , 'id') ;
    }




    public function avatarUrl(): string
    {
        return $this->images->first()
            ? asset('img/front/users/' . $this->images->first()->image_path)
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?d=mp&f=y';
    }

    public function scopeGetUsersFromRequest($query, $request)
    {
        return $query->when($request->has('all'),
            fn($query) => $query->where('id', '!=', auth()->id())->get(),
            fn($query) => $query->find($request->validated()['ids'])
        );
    }



}



