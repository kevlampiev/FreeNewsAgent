<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class Article extends Model
{
    protected $fillable = ['title', 'announcement', 'article_body',
        'is_private', 'category_id', 'source_id', 'guid', 'link', 'img'];

    public function __construct(array $attributes = [], string $slug = null, int $source_id = null)
    {
        parent::__construct($attributes);
        if ($source_id) $this->source_id = $source_id;
        if ($slug) {
            $category = ArticlesCategory::query()->where('slug', $slug)->first();
            if ($category) $this->category_id = $category->id;
        }
        $this->guid = 'localhost/' . now();
        $this->link = 'localhost';
    }

    public function category()
    {
        return $this->hasOne(ArticlesCategory::class, 'id', 'category_id');
    }

    public function source()
    {
        return $this->hasOne(InfoSource::class, 'id', 'source_id');
    }

    public static function searchResult(string $search):LengthAwarePaginator
    {
        $searchStr='%'.str_replace(' ','%',$search).'%';
        $articles=static::query()
                ->where('title','like',$searchStr)
                ->orWhere('announcement','like',$searchStr)
                ->orWhere('article_body','like',$searchStr)
                ->paginate(15);
        return $articles;
    }
}
