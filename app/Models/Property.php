<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function subCategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'properties_sub_categories')
        ->withTimestamps();
    }


    public function values(): HasMany
    {
        return $this->hasMany(PropertyValue::class);
    }


}
