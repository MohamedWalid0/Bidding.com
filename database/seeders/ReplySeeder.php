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
>>>>>>> 29b4779cf74e32a14ee86aa0f24a30ebef37cfc5
    }
}
