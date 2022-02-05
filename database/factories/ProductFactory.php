<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
        $brands =  collect(['LG' , 'Samsung' , 'Apple' , 'Infinix'
        , 'Cannon' , 'Sony' , 'Lenovo' , 'Dell' , 'HP' , 'Toshiba' , 'Mobile' , 'Car' ]);
        $deadline = Carbon::now()->addMonth(1)->subDays(random_int(1,30))->subHours(rand(0, 23))->addMinutes(0);
        if ( Carbon::now()->greaterThanOrEqualTo($deadline)) {
            $status = 'inactive';
        } else $status = 'active';
        return [
            'name' => $brands->random() . ' ' . $this->faker->numberBetween(1000 , 1600),
            'description' => $this->faker->realText,
            'location' => $this->faker->address,
            'user_id' => User::inRandomOrder()->first()->id,
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'start_price' => $this->faker->numberBetween(1000, 10000),
            'status' => $status,
            'deadline' => $deadline,
            'created_at' => Carbon::today()
                ->subDays(random_int(1, 30))
                ->addRealYears(random_int(1, 6))
                ->subYears(random_int(1, 6))
                ->addRealDays(random_int(1, 6))
                ->subHours(random_int(1, 24))
                ->subMonths(random_int(1, 12))
                ->subMinutes(random_int(1, 55)),
        ];
    }
}
