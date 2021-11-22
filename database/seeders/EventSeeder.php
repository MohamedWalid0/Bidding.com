<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();


        $events = [
            'click' ,
            'hover' ,
            'view'
        ];

        foreach ($events as $event) {

            Event::create(['name' => $event]);

        }
    }
}
