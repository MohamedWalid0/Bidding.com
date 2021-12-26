<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates' ;
    protected $guarded = [] ;



    public function review(): HasOne
    {
        return $this->hasOne(Review::class, 'rate_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function userRated(): BelongsTo
    {
        return $this->belongsTo(User::class , 'rater_id');
    }

}
