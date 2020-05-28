<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function articlesOfCategory(int $id)
    {
        $category = DB::selectOne('SELECT id,name from news_categories WHERE id=?', [$id]);
        var_dump($category);
        //DBConnService::selectSingleRow('SELECT id,name from news_categories WHERE id=?', [$id]);
        if ($category==null) {
            abort(404);
        }
        $newsOfCategory = DB::select('SELECT * FROM articles WHERE category_id=?', [$id]);

            //DBConnService::selectRowsSet('SELECT * FROM v_news WHERE category_id=?', [$id]);

        return view('customer.news-of-category', [
            'news' => $newsOfCategory,
            'category' => $category
        ]);
    }
}
