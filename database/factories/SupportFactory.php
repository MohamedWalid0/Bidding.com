<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SupportFactory extends Factory
{
    protected $model = Support::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->words(20 , true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
