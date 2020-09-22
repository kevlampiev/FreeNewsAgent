<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoSource;
use Illuminate\Http\Request;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function loadAllNews()
    {
        $sources = InfoSource::all();
        foreach ($sources as $source) {
            NewsParsing::dispatch($source->http_address);
        }
        session()->flash('proceed_status', 'Задания на скачивания всех новостей поставлены в очередь');
        return back();
    }

    public function loadSingle(InfoSource $source)
    {
        NewsParsing::dispatch($source->http_address);
        session()->flash('proceed_status', "Задания на скачивание новостей с ресурса $source->http_address поставлено в очередь");
        return back();
    }

}
