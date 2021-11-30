<?php

namespace Database\Seeders;

use App\Models\PropertyValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('property_values')->delete();


        PropertyValue::factory(50)->create();



    }




}
