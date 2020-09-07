<?php


namespace App\Repositories\Parsers;


use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class VzglyadParser
{
    private $sourceUrl;


    public function __construct(string $sourceName)
    {
        $this->sourceUrl='https://vz.ru/rss.xml';
    }

    public function getData(): array
    {
        $xml = XmlParser::load($this->sourceUrl);
        $data = $xml->parse(
            [
                'source' => ['uses' => 'channel.link'],
                'news' => ['uses' => 'channel.item[category,title,link,guid,enclosure::url,description,pubDate]'],
            ]
        );
        //хочу чтобы на выходе был стандарный массив, но не знаю как иначе
        $result = [];
        foreach ($data['news'] as $el) {
            $result[] = [
                'category' => $el['category'],
                'slug' => Str::slug($el['category']),
                'source' => $data['source'],
                'title' => $el['title'],
                'announcement' => $el['title'],
                'article_body' => $el['description'],
                'img' => $el['enclosure::url'],
                'is_private' => false,
                'link' => $el['link'],
                'created_at' => $el['pubDate'],
                'guid'=>$el['guid']
            ];
        }
        return $result;
    }

}
