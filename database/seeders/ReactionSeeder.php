<?php

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactions')->delete();

        Reaction::factory(100)->create();
    }
}
