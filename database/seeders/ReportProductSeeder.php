<?php

namespace Database\Seeders;

use App\Models\ReportProduct;
use Illuminate\Database\Seeder;

class ReportProductSeeder extends Seeder
{
    public function run()
    {
        ReportProduct::factory(10)->create();
    }
}
