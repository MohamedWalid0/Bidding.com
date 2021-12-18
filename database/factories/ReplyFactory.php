<?php

namespace Database\Factories;

use App\Models\Comment;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        return [
            'user_id' => $product->user->id,
            'comment_id' => $product->comments->random()->id,
            'body' => $this->faker->realText ,
            'created_at' => Carbon::now()->subDays(rand(0, 365))->subHours(rand(0, 23))->subMinutes(rand(1, 55)),
            'updated_at' => Carbon::now(),
        ];
    }
}
