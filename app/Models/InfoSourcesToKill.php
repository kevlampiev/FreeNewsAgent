<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoSourcesToKill
{
    //ключ элемента - это id, может идти в произвольном порядке и с пропусками
    private static $infoSources=[
        1=>[
            'name'=>"Mail.ru",
            'url'=>'https://mail.ru'
        ],

        3=>[
            'name'=>"Яндекс",
            'url'=>'https://yandex.ru'
        ],

        7=>[
            'name'=>"Google",
            'url'=>'https://google.com'
        ],
    ];

    public static function getAll() {
        return static::$infoSources;
    }

    public static function getOne(int $id) {
         return static::$infoSources[$id];
    }

}
