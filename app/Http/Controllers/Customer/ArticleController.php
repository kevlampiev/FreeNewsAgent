<?php

namespace App\Http\Controllers\Customer;

use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\NewsRequest;
use App\Models\ArticlesCategory;
use Illuminate\Http\Response;


class ArticleController extends Controller
{
    public function index(string $slug, int $id)
    {
//        $new=DBConnService::selectSingleRow('SELECT * FROM v_news WHERE category_id=? AND id=?',[$category_id,$id]);
        $category = ArticlesCategory::whereSlug($slug)->first();
        if ($category == null) {
            abort(404, 'Группы новостей $slug не существует');
        }
        $article = Articles::all()->where('category_id', $category->id)->where('id', $id)->first();
        if ($article == null) {
            abort(404, 'Новость с таким идентификатором отсутствует');
        }
        return view('customer.article', ['new' => $article]);

    }

}
