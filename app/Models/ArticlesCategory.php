<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Articles;

class ArticlesCategory extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'news_categories';

    public function articles()
    {
        return $this->hasMany(Articles::class,'category_id','id');
    }
}
