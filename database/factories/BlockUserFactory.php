<?php

namespace Database\Factories;

use App\Models\BlockUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockUserFactory extends Factory
{
    protected $model = BlockUser::class;

    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        $roleId = Role::where('name' , 'admin')->first()->id ;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'admin_id' => User::where('role_id' , $roleId)->inRandomOrder()->first()->id,
        ];

    }


}
