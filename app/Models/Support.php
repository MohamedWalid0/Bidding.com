<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
