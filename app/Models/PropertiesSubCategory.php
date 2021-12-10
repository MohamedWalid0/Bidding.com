<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PropertiesSubCategory extends Pivot
{
    use HasFactory;

    protected $table = 'properties_sub_categories';

    protected $guarded = [];

}
