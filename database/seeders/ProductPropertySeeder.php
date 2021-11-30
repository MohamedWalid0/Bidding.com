<?php

namespace Database\Seeders;

use App\Models\ProductProperty;
use App\Models\PropertiesSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_properties')->delete();

        ProductProperty::factory(50)->create();




    }




}
