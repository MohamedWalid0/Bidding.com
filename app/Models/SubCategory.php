<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'properties_sub_categories')
            ->withTimestamps();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function ImageUrl(): string
    {
        return $this->images->first()
            ? asset("img/front/sub_categories/{$this->id}/thump-" . $this->images->first()->image_path)
            : 'https://www.gravatar.com/avatar/';
    }

}
