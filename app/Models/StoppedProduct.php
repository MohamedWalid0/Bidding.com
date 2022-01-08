<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoppedProduct extends Model
{
    use HasFactory;
    protected $table = 'stopped_products' ;
    protected $guarded = [] ;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
