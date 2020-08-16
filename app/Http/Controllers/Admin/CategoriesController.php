<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function index()
    {
        return view('admin.categories',['categories'=>ArticlesCategory::all()]);
    }

    public function articlesOfCategory(string $slug)
    {
        $category=ArticlesCategory::whereSlug($slug)->first();
        if ($category==null) {
            abort(404);
        }
        $newsOfCategory = Articles::where('category_id',$category->id)->get();
        return view('admin.articles-of-category', [
            'news' => $newsOfCategory,
            'category' => $category
        ]);
    }
}
