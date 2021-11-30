<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyValueFactory extends Factory
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
            'value' => $this->faker->word,
        ];

    }

}
