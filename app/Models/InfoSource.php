<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoSource extends Model
{
    //
    protected $table = 'news_sources'; //Исторически так сложилось
    protected $fillable = ['name', 'http_address', 'description'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'source_id', 'id');
    }
}