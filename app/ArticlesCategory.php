<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesCategory extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'news_categories';
}
