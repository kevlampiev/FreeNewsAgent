<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InfoSourcesAlternative
{

    public $name;
    public $url;
    public $description;

    public function __construct($name ='', $url='https://', $description='')
    {
        $this->name=$name;
        $this->url=$url;
        $this->description=$description;
    }

    private static $fname='info_sources.json';

    public static function getAll(): ? array
    {
        try {
            $disk=Storage::disk('local');
            if (!$disk->exists(static::$fname)) {
                Storage::disk('local')->put(static::$fname, '[]');
                return [];
            }
            return json_decode($disk->get(static::$fname));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    private static function save(array $allSources):void
    {
        Storage::disk('local')->put(static::$fname, json_encode($allSources));
    }

    public static function getOne(int $id) {
         return static::getAll()[$id];
    }

    public static function addSource($data)
    {
        $allSources=static ::getAll();
        $allSources[]=$data;
        try {
            static::save($allSources);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
        return $allSources;
    }

    public static function deleteSource($index)
    {
        $allSources=static::getAll();
        $result=[];
        foreach($allSources as $key=>$el)
        {
            if ($key!=$index) $result[]=$el;
        }
        static::save($result);
        return $result;
    }

    public static function editSource($index, $data)
    {
        $allSources=static::getAll();
        if (isset($allSources[$index])) {
            $allSources[$index]=$data;
            static::save($allSources);
        }
        return $allSources;
    }

}
