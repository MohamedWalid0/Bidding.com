<?php

namespace Database\Seeders;

use App\Models\ReportUser;
use Illuminate\Database\Seeder;

class ReportUserSeeder extends Seeder
{
    public function run()
    {
        ReportUser::factory(10)->create();
    }
}
