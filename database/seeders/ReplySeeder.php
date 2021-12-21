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

<<<<<<< HEAD
        Reply::factory(800)->create();
=======
        Reply::factory(400)->create();
>>>>>>> 8af0f60e1dfe16d0b4e5f35fd05409ff0a5ef6e6
    }
}
