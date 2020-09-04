<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(NewsSourcesSeeder::class);
//        $this->call(CategoriesSeeder::class);
//        $this->call(ArticlesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
