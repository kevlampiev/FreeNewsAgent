<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;


class ArticlesController extends Controller
{
    public function index(int $category_id, int $id) {
        $new=DBConnService::selectSingleRow('SELECT * FROM v_news WHERE category_id=? AND id=?',[$category_id,$id]);
        if ($new==null||count($new)==0) {
            abort(404);
        }
        return view('customer.article',['new'=>$new]);

    }

    public function add(int $category_id) {
        $category=DBConnService::selectSingleRow('SELECT id,name FROM news_categories WHERE id=?',[$category_id]);
        if ($category==null||count($category)==0) {
            abort(404);
        }

        $categories=DBConnService::selectRowsSet('SELECT id,name FROM news_categories ORDER BY name');

        return view('customer.article-add',[
            'category'=>$category,
            'categoryList'=>$categories
        ]);
    }
}
