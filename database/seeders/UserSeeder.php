<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)
            ->create()
            ->each(function($user){
                $user->account()->save(Account::factory()->make());
            })
            ->each(function($user){
                $user->wishlist()->save(Wishlist::factory()->make());
            });
    }
}
