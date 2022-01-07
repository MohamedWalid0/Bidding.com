<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();


        $roles = [
            'admin' ,
            'moderator' ,
            'support_team' ,
            'user'
        ];

        foreach ($roles as $role) {
            Role::factory()->create(['name' => $role]);
        }


    }
}
