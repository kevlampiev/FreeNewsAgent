<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpArticleData extends Model
{
    protected $fillable = ['category',
        'source', 'slug', 'title', 'announcement', 'article_body', 'img',
        'is_private', 'link', 'guid', 'created_at'];
}
