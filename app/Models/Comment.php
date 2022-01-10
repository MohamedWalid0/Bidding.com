<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'user_id'
    ];

    protected $appends = ['reactions_count'];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphToMany(User::class, 'likeable' , 'reactions')
        ->using(Reaction::class)
        ->withPivot('value')
        ->as('like')
        ->withTimestamps();
    }


    public function getReactionsCountAttribute () {
            $this->withCount([
                'likes'
            ]);
    }


}
