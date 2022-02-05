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
            ['name'=>'color'] ,
            ['name'=>'size' ],
            ['name'=>'brand' ],
            ['name'=>'material'] ,
            ['name'=>'capacity'] ,
            ['name'=>'width'] ,
            ['name'=>'height'] ,
        ];


        Property::insert($properties);

        Property::factory(50)->create();



    }




}
