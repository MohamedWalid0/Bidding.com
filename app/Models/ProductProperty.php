<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductProperty extends Pivot
{
    use HasFactory;

    protected $table = 'product_properties';
    protected $guarded = [];

}
