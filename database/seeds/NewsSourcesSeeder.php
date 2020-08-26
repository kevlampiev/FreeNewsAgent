<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_sources')->insert($this->getData());
    }

    private function getData(): array
    {

        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->realText(rand(20, 50)),
                'http_address' => 'http://www.' . str_replace(' ', '', $faker->realText(rand(10, 15))) . 'com',
                'description' => $faker->realText(rand(100, 200))
            ];
        }
        return $data;
    }
}
