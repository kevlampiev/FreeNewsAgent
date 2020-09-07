<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\Parsers\VzglyadParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Repositories\Parsers\LentaParser;

class ParserController extends Controller
{
    public function index()
    {
//        $data = ArticleRepository::getLentaArticles();
        $parser=new LentaParser('lenta');
        ArticleRepository::storeArticles($parser->getData());
        return back();
    }

    public function loadVzglyad() {
        $parser=new VzglyadParser('vzglyad');
        ArticleRepository::storeArticles($parser->getData());
        return back();
    }
}
