<?php


namespace App\Repositories;


use App\Models\TmpArticleData;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ArticleRepository
{
    public static function getYandexArticles(string $url, string $category=null): array
    {
        $xml = XmlParser::load($url);
        $data = $xml->parse(
            [
                'category' => ['uses' => ($category??'channel.title')],
                'source' => ['uses' => 'channel.link'],
                'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
            ]
        );
        //хочу чтобы на выходе был стандарный массив, но не знаю как иначе
        $result = [];
        foreach ($data['news'] as $el) {
            $result[] = [
                'category' => $data['category'],
                'slug' => Str::slug($data['category']),
                'source' => $data['source'],
                'title' => $el['title'],
                'announcement' => $el['title'],
                'article_body' => $el['description'],
                'img' => '',
                'is_private' => false,
                'link' => $el['link'],
                'created_at' => $el['pubDate']
            ];
        }
        return $result;
    }


    public static function getLentaArticles(): array
    {
        $xml = XmlParser::load('https://lenta.ru/rss');
        $data = $xml->parse(
            [
                'source' => ['uses' => 'channel.link'],
                'news' => ['uses' => 'channel.item[category,title,link,guid,description,pubDate]'],
            ]
        );

        //хочу чтобы на выходе был стандарный массив, но не знаю как иначе
        $result = [];
        foreach ($data['news'] as $el) {
            $result[] = [
                'category' => $el['category'],
                'slug'=>Str::slug($el['category']),
                'guid'=>$el['guid'],
                'source' => $data['source'],
                'title' => $el['title'],
                'announcement' => $el['title'],
                'article_body' => $el['description'],
                'img' => '',
                'is_private' => false,
                'link' => $el['link'],
                'created_at' => $el['pubDate']
            ];
        }


        return $result;
    }


    public static function storeArticles(array $articles)
    {
        if (count($articles) > 0) {
            foreach ($articles as $el) {
                $article = new TmpArticleData();
                $article->fill($el);
                $article->save();
            }
        }


    }


}
