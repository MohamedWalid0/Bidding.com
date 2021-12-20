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
     * @throws \Exception
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        return [
            'user_id' => $product->user->id,
            'comment_id' => $product->comments->random()->id,
            'body' => $this->faker->realText ,
            'created_at' => Carbon::now()->subDays(random_int(0, 365))->subHours(random_int(0, 23))->subMinutes(random_int(1, 55)),
            'updated_at' => Carbon::now(),
        ];
    }
}
