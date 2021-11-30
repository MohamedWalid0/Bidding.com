<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'address',
        'gender_id',
        'city_id',
        'age',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'id');
    }

}
