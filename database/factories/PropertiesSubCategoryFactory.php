<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertiesSubCategoryFactory extends Factory
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
            'property_id' => Property::inRandomOrder()->first()->id ,
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
        ];
    }
}
