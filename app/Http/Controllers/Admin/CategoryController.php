<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoSourcesRequest;
use App\Models\Article;
use App\Models\ArticlesCategory;
use App\Http\Requests\CategoriesRequest;
use App\Models\InfoSource;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = ArticlesCategory::withCount('articles')->get();
        return view('admin.categories', ['categories' => $categories]);
    }

//    private function getFromForm(ArticlesCategory $category, CategoriesRequest $request)
//    {
//        $category->name=$request->get('name');
//        $category->slug=$request->get('slug');
//        $category->description=$request->get('description');
//        $category->save();
//    }

    public function create()
    {
        return view('admin.category-add', ['category' => new ArticlesCategory()]);
    }

    public function insert(CategoriesRequest $request)
    {
        $category = new ArticlesCategory();
        $category->fill($request->toArray())->save();
        session()->flash('proceed_status', 'Категория новостей добавлена');
        return redirect()->route('admin.categoriesList');
    }


    public function edit(ArticlesCategory $category)
    {
        return view('admin.category-add', [
            'category' => $category,
        ]);
    }

    public function update(ArticlesCategory $category, CategoriesRequest $request)
    {
        $category->fill($request->toArray())->save();
        session()->flash('proceed_status', 'Категория изменена');
        return redirect()->route('admin.categoriesList');
    }

    public function delete(ArticlesCategory $category)
    {
        $category->delete();
        session()->flash('proceed_status', 'Категория новостей удалена');
        return redirect()->route('admin.categoriesList');
    }


    public function articlesOfCategory(string $slug)
    {
        $category = ArticlesCategory::whereSlug($slug)->first();
        if ($category == null) {
            abort(404);
        }
        $newsOfCategory = Article::where('category_id', $category->id)->paginate(5);
//        session()->start();
//        session()->put('work_sector', 'admin.articlesOfCategory');
        session()->put('work_sector', url()->current());
        return view('admin.articles-of-category', [
            'news' => $newsOfCategory,
            'category' => $category
        ]);
    }
}
