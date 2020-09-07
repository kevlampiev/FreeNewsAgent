<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticlesCategory extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'news_categories';
    protected $fillable = ['slug', 'name', 'description'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
