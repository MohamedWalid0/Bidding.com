<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'name' => $this->faker->word(2 , TRUE),
            'description' => $this->faker->realText,
            'location' => $this->faker->address,
            'user_id' => User::inRandomOrder()->first()->id,
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'start_price' => $this->faker->numberBetween(1000 , 10000),
            'deadline' => now()->addDays(random_int(1,10)),
            'status' => $this->faker->randomElement(['active' , 'inactive'])
        ];
    }
}
