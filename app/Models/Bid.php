<?php

namespace App\Models;

use App\Casts\CostCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Bid extends Pivot
{
    use HasFactory;

    protected $table = 'bids';

    protected $casts = [
        // 'cost' => CostCast::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

}
