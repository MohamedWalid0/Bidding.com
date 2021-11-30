<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'electronics',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'jewelery',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'men\'s clothing',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'women\'s clothing',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Car',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Plans',
                    'created_at' => '2021-11-28 23:09:40',
                    'updated_at' => '2021-11-28 23:09:40',
                ),
        ));


    }
}
