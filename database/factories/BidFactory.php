<?php

namespace Database\Factories;

use App\Models\Bid;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BidFactory extends Factory
{
    protected $model = Bid::class;

    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'cost' => random_int(1, 100000),
            'created_at' => Carbon::today()->subYears(random_int(0, 6))->subDays( random_int(1, 30))->subHours(random_int(1, 24))->subMonths(random_int(1, 12))->subMinutes( random_int(1, 55) ),
            'updated_at' => Carbon::now(),
        ];
    }
}
