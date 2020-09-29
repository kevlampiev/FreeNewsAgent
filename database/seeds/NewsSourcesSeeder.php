<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourcesSeeder extends Seeder
{
    private $rssLinks = [
        ['https://news.yandex.ru/auto.rss','Авто'],
        ['https://news.yandex.ru/auto_racing.rss','Авто'],
        ['https://news.yandex.ru/army.rss','Амия'],
        ['https://news.yandex.ru/gadgets.rss','IT'],
        ['https://news.yandex.ru/martial_arts.rss','Единоборства'],
        ['https://news.yandex.ru/communal.rss','ЖКХ'],
        ['https://news.yandex.ru/health.rss','Здоровье'],
        ['https://news.yandex.ru/games.rss','Игры'],
        ['https://news.yandex.ru/internet.rss','IT'],
        ['https://news.yandex.ru/cyber_sport.rss','IT'],
        ['https://news.yandex.ru/movies.rss','Кино'],
        ['https://news.yandex.ru/cosmos.rss','Космос'],
        ['https://news.yandex.ru/culture.rss','Культура'],
        ['https://news.yandex.ru/championsleague.rss','Спорт'],
        ['https://news.yandex.ru/music.rss','Музыка'],
        ['https://news.yandex.ru/nhl.rss','Спорт'],
        ['https://lenta.ru/rss',''],
        ['https://vz.ru/rss.xml',''],
        ['https://www.kommersant.ru/RSS/news.xml','Экономика'],
    ];

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
        foreach ($this->rssLinks as $link) {
            $data[] = [
                'name' => $link[0],
                'http_address' => $link[0],
                'description' => $faker->realText(rand(100, 200)),
                'default_category_name'=>$link[1],
            ];
        }
        return $data;
    }
}
