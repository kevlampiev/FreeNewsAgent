<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Models\ArticlesCategory;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function articlesOfCategory(string $slug)
    {
        $category = ArticlesCategory::whereSlug($slug)->first();
//        dd($category);
//        $category = DB::selectOne('SELECT id,name from news_categories WHERE id=?', [$id]);
        //DBConnService::selectSingleRow('SELECT id,name from news_categories WHERE id=?', [$id]);
        if ($category == null) {
            abort(404);
        }
        $newsOfCategory = Articles::where('category_id', $category->id)->paginate(5);
//            DB::select('SELECT * FROM articles WHERE category_id=?', [$id]);

        //DBConnService::selectRowsSet('SELECT * FROM v_news WHERE category_id=?', [$id]);

        return view('customer.articles-of-category', [
            'news' => $newsOfCategory,
            'category' => $category
        ]);
    }
}
