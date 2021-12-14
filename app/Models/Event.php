<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    public const CLICK = 1;


    public function product_events(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'histories')
            ->withTimestamps();
    }


}
