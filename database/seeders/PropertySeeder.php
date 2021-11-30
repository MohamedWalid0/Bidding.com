<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('properties')->delete();


        $properties = [
            'color' ,
            'size' ,
            'brand' ,
            'material' ,
        ];

        foreach ($properties as $property) {
            Property::create(['name' => $property]);
        }


        Property::factory(50)->create();



    }




}
