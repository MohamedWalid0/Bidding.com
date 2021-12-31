<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->delete();

        Reply::factory(100)->create();
    }
}
