<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    public function run()
    {
        Bid::factory(100)->create();
    }
}
