<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Articles extends Model
{
    protected $fillable = ['title', 'announcement', 'article_body', 'is_private', 'category_id', 'source_id'];

    public function __construct(array $attributes = [], string $slug = null, int $source_id = null)
    {
        parent::__construct($attributes);
        if ($source_id) $this->source_id = $source_id;
        if ($slug) {
            $category = ArticlesCategory::query()->where('slug', $slug)->first();
            if ($category) $this->category_id = $category->id;
        }
    }

    public function category()
    {
        return $this->hasOne(ArticlesCategory::class, 'id', 'category_id');
    }

    public function source()
    {
        return $this->hasOne(InfoSources::class, 'id', 'source_id');
    }

}
