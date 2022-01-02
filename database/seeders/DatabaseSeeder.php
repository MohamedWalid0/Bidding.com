<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            GenderSeeder::class,
            CitySeeder::class,
            EventSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            PropertySeeder::class,
            PropertiesSubCategorySeeder::class ,
            PropertyValueSeeder::class ,
            ProductPropertySeeder::class ,
            ProductWishlistSeeder::class ,
            BidSeeder::class,
            HistorySeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            ReactionSeeder::class,
            SupportSeeder::class ,
            // BlockSeeder::class






        ]);


    }
}
