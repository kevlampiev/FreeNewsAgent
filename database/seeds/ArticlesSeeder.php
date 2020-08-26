<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert($this->getData());
        //
    }

    private function getData(): array
    {
        $result = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 1; $i < 11; $i++) {
            $rnd = rand(5, 10);
            for ($j = 0; $j < $rnd; $j++) {
                $result[] = [
                    'title' => $faker->sentence(rand(10, 15)),
                    'announcement' => $faker->sentence(rand(3, 10)),
                    'article_body' => $faker->realText(rand(100, 300)),
                    'is_private' => (boolean)rand(0, 1),
                    'category_id' => $i
                ];
            }
        }
        return $result;
    }
}
