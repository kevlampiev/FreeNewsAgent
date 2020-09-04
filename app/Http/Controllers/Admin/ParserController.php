<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $data = ArticleRepository::getLentaArticles();
        ArticleRepository::storeArticles($data);
        DB::unprepared('CALL parse_articles()');
        session()->flash('proceed_status', 'Произведена зазрузка данных Lenta.ru');
        return back();
    }
}
