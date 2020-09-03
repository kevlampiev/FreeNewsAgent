<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {
        $xml=XmlParser::load('https://news.yandex.ru/politics.rss');
        $data=$xml->parse(
            [
                'category'=>['uses'=>'channel.title'],
                'source'=>['uses'=>'channel.link'],
                'category_description'=>['uses'=>'channel.description'],
                'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]'],
            ]
        );
        dd($data);
    }
}
