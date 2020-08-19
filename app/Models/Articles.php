<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Articles extends Model
{
    public function category() {
        return $this->hasOne(ArticlesCategory::class,'id','category_id');
    }

}
