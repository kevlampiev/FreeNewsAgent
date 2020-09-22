<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class InfoEnquiery extends Model
{
//    protected $table="info_requests";
    protected $fillable = ['request_body', 'user_id', 'id'];
    protected $table = 'info_requests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
