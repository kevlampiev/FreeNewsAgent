<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoRequest extends Model
{
//    protected $table="info_requests";
    protected $fillable = ['user_name', 'phone', 'email', 'request_body'];
}
