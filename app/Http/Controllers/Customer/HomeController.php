<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Models\ArticlesCategory;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $latestNews = DB::table('articles')
            ->join('news_categories', 'articles.category_id', '=', 'news_categories.id')
            ->select('articles.*', 'news_categories.name', 'news_categories.slug')
            ->orderByDesc('articles.created_at')
            ->limit(5)
            ->get();
        //$latestNews=DBConnService::selectRowsSet('SELECT * from v_news ORDER BY created_at DESC LIMIT 5');
        return view('customer.main', [
            'news' => $latestNews
        ]);
    }

//    public function login() {
//        return view('customer.login');
//    }

    public function newsCategoriesList()
    {
//        $newsCategories= DB::select('SELECT * from news_categories ORDER BY name');
        //DBConnService::selectRowsSet('SELECT * from news_categories ORDER BY name');
//        return view('customer.categories', [
//            'categories' => $newsCategories
//        ]);
        return view('customer.categories', [
            'categories' => ArticlesCategory::all()
        ]);
    }

    public function privacy()
    {
        return view('customer.privacy');
    }
}
