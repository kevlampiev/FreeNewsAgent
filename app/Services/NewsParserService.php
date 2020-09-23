<?php


namespace App\Services;


use App\Models\TmpArticleData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mockery\Exception;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Log;

class NewsParserService implements ShouldQueue
{
    private $sourceUrl;
    private $defaultCategory;

    public function __construct(string $sourceUrl, string $defaultCategory='none')
    {
        $this->sourceUrl = $sourceUrl;
        $this->defaultCategory=$defaultCategory;
//        echo $this->defaultCategory;

    }

    public function getData(): array
    {
        echo $this->defaultCategory;
        echo $this->sourceUrl;

        $xml = XmlParser::load($this->sourceUrl);
        echo 'xml';
        $data = $xml->parse(
            [
                'channel.title' => ['uses' => 'channel.title'],
//                'source' => ['uses' => $this->sourceUrl],
                'category' => ['uses' => 'channel.category'],
                'news' => ['uses' => 'channel.item[category,title,link,guid,enclosure::url,description,pubDate]'],
            ]
        );
        echo '<data_category='.$data['category'].'>/n';
        echo '<default_category='.$this->defaultCategory.'>/n';
        if ($data['category'] == null||trim($data['category']) == '') {
            if ($data['channel.title'] == null||trim($data['channel.title']) == '') {
                $data['category'] = $this->defaultCategory;
            } else {
                $data['category']=trim($data['channel.title']);
            }
        }

        $result = [];
        foreach ($data['news'] as $el) {

            $result[] = [
                'category' => strip_tags(($el['category'] != null) ? $el['category'] : $data['category']),
                'slug' => strip_tags(Str::slug(($el['category'] != null) ? $el['category'] : $data['category'])),
                'source' => strip_tags($this->sourceUrl),
                'title' => strip_tags($el['title']),
                'announcement' => strip_tags($el['title']),
                'article_body' => strip_tags($el['description']),
                'img' => isset($el['enclosure::url']) ? $el['enclosure::url'] : '',
                'is_private' => false,
                'link' => $el['link'],
                'created_at' => $el['pubDate'],
                'guid' => $el['guid']??$el['link']
            ];

        }
        return $result;
    }


    public function storeArticles()
    {
        try {
            $articles = $this->getData();
            //оптимальнее не получится с учетом того, что использую временные таблицы базы
            if (count($articles) > 0) {
                foreach ($articles as $el) {
                    $article = new TmpArticleData();
                    $article->fill($el);
                    $article->save();
                }
            }
            DB::unprepared('CALL parse_articles()');
            session()->flash('proceed_status', 'Произведена зазрузка данных Lenta.ru');

        } catch (Exception $e) {
            Log::info("Error parsing news $e->getMessage()");
        }

    }


}
