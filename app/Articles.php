<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Articles extends Model
{
    public function category() {
        return $this->hasOne(NewsCategory::class,'id','category_id');
    }
    //
}
