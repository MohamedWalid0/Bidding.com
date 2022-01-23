<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class)->with(['products' , 'products.user_bids']);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function ImageUrl(): string
    {
        return $this->images->first()
            ? asset("img/front/categories/{$this->id}/thump-" . $this->images->first()->image_path)
            : 'https://www.gravatar.com/avatar/';
    }

}
