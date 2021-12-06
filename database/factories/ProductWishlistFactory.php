<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductWishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id ,
            'wishlist_id' => random_int(1,50)
        ];
    }
}
