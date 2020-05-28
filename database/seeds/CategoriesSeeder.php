<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert($this->getData());
    }

    private function getData():array
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[]=[
                'name'=>$faker->sentence(rand(3,10)),
                'description'=>$faker->realText(rand(100,200))
            ];
        }

        return $data;
    }
}
