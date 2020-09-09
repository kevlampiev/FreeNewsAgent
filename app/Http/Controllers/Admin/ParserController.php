<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NewsParser;

class ParserController extends Controller
{
    public function index()
    {
        $rssLinks=[
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
            'https://lenta.ru/rss',
            'https://vz.ru/rss.xml'
        ];

        foreach($rssLinks as $link) {
            $parser=new NewsParser($link);
            $parser->storeArticles();
        }
        return back();
    }

    public function loadVzglyad() {
//        $parser=new NewsParser('https://lenta.ru/rss');
//        $parser->storeArticles();
//        return back();
    }
}
