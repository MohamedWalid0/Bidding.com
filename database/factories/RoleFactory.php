<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'abilities' => collect(config('abilities'))->keys()->random(random_int( 0, 11))->toArray(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
