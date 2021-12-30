<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
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
            'full_name' => $this->faker->firstName . ' ' .$this->faker->lastName ,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'gender_id' => Gender::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'age' => random_int(20 , 90),
        ];
    }
}
