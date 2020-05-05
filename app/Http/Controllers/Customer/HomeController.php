<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;

class HomeController extends Controller
{
    //
    public function index()
    {
        $latestNews=DBConnService::selectRowsSet('SELECT * from v_news ORDER BY created_at DESC LIMIT 5');
        return view('customer.main',[
            'news'=>$latestNews
        ]);
    }

    public function login() {
        return view('customer.login');
    }

    public function newsCategoriesList()
    {
//        $newsCategories = [
//            ['id' => 1, 'name' => 'Новости спорта', 'description'=>'Все новости, касающиеся спорта'],
//            ['id' => 2, 'name' => 'Политика', 'description'=>'Все новости, касающиеся политики'],
//            ['id' => 3, 'name' => 'Медицина', 'description'=>'Все новости, касающиеся медицины'],
//            ['id' => 4, 'name' => 'Экономика', 'description'=>'Все новости, касающиеся экономики'],
//        ];

        $newsCategories=DBConnService::selectRowsSet('SELECT * from news_categories ORDER BY name');
        return view('customer.categories', [
            'categories' => $newsCategories
        ]);
    }

}
