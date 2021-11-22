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
            'Cairo' ,
            'Giza' ,
            'Alexandria',
            'Port Said',
            'Suez',
            'Ţanta',
            'Asyut',
            'Al Fayyum',
            'Ismailia',
            'Aswan',
            'Kafr al Dawwar',
            'Damanhur',
            'Al Minya',
            'Damietta',
            'Luxor',
            'Siwa' ,
            'Qina',
            'Suhaj',
            'Bani Suwayf',
            'Al Ghardaqah' ,
            'Banhq' ,
            'Kafr al Shaykh'

        ];


        foreach ($cities as $city) {

            City::create(['name' => $city]);

        }
    }
}
