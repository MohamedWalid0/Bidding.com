<?php

namespace Database\Seeders;

use App\Models\ProductWishlist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductWishlistSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_wishlists')->delete();

        ProductWishlist::factory(100)->create();
    }
}
