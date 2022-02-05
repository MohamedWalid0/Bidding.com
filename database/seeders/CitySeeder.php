<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = [
            ['name' =>'Cairo'] ,
            ['name' =>'Giza'] ,
            ['name' =>'Alexandria'],
            ['name' =>'Port Said'],
            ['name' =>'Suez'],
            ['name' =>'Ţanta'],
            ['name' =>'Asyut'],
            ['name' =>'Al Fayyum'],
            ['name' =>'Ismailia'],
            ['name' =>'Aswan'],
            ['name' =>'Kafr al Dawwar'],
            ['name' =>'Damanhur'],
            ['name' =>'Al Minya'],
            ['name' => 'Damietta'],
            ['name' =>'Luxor'],
            ['name' =>'Siwa' ],
            ['name' => 'Qina'],
            ['name' =>'Suhaj'],
            ['name' =>'Bani Suwayf'],
            ['name' =>'Al Ghardaqah'] ,
            ['name' =>'Banhq' ],
            ['name' =>'Kafr al Shaykh']

        ];



        City::insert($cities);

    }
}
