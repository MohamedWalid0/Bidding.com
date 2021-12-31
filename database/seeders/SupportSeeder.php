<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    public function run()
    {
        Support::factory(100)->create();
    }
}
