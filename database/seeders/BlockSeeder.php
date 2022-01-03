<?php

namespace Database\Seeders;

use App\Models\BlockUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockSeeder extends Seeder
{
    public function run()
    {
        DB::table('block_users')->delete();

        BlockUser::factory(30)->create();
    }
}
