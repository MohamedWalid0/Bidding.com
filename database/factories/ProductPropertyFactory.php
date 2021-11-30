<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPropertyFactory extends Factory
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
            'property_value_id' => PropertyValue::inRandomOrder()->first()->id,
        ];
    }
}
