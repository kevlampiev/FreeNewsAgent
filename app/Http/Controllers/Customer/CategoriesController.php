<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;

class CategoriesController extends Controller
{
    public function articlesOfCategory(int $id)
    {
        $category = DBConnService::selectSingleRow('SELECT id,name from news_categories WHERE id=?', [$id]);
        if ($category==null||count($category)==0) {
            abort(404);
        }
        $newsOfCategory = DBConnService::selectRowsSet('SELECT * FROM v_news WHERE category_id=?', [$id]);

        return view('customer.news-of-category', [
            'news' => $newsOfCategory,
            'category' => $category
        ]);
    }
}
