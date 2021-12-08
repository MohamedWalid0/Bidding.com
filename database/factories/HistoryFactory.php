<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\History;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    protected $model = History::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'event_id' => Event::inRandomOrder()->first()->id,
            'created_at' => Carbon::now()->subDays(rand(0, 365))->subHours(rand(0, 23))->subMinutes(rand(1, 55)),
            'updated_at' => Carbon::now(),
        ];
    }
}
