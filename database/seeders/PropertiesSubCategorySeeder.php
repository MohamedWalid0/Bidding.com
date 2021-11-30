<?php

namespace Database\Seeders;

use App\Models\PropertiesSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('properties_sub_categories')->delete();

        PropertiesSubCategory::factory(50)->create();




    }




}
