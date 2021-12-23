<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates' ;
    protected $guarded = [] ;



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
