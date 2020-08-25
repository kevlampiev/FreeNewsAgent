<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Articles extends Model
{
    protected $fillable = ['title', 'announcement', 'article_body', 'is_private', 'category_id', 'source_id'];

    public function category()
    {
        return $this->hasOne(ArticlesCategory::class, 'id', 'category_id');
    }

}
