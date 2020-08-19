<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCategory;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{


    public function index()
    {
//        $categories=DB::select('SELECT * FROM v_categories');
//        $categories=ArticlesCategory::all();
          $categories=ArticlesCategory::withCount('articles')->get();
//        dd($categories);
        return view('admin.categories',['categories'=>$categories]);
    }

    private function getFromForm(ArticlesCategory $category, CategoriesRequest $request)
    {
        $category->name=$request->get('name');
        $category->slug=$request->get('slug');
        $category->description=$request->get('description');
        $category->save();
    }

    public function create()
    {
        $category=new ArticlesCategory();
        return view('admin.category-add',['category'=>$category]);
    }

    public function insert(CategoriesRequest $request)
    {
        $category=new ArticlesCategory();
            $this->getFromForm($category, $request);
            session()->flash('proceed_status','Категория добавлена');
            return redirect()->route('admin.categoriesList');
    }


    public function edit(ArticlesCategory $category) {
        return view('admin.category-add',[
            'category'=>$category,
        ]);
    }

    public function update(ArticlesCategory $category, CategoriesRequest $request) {
        $this->getFromForm($category, $request);
        session()->flash('proceed_status','Категория изменена');
        return redirect()->route('admin.categoriesList');
    }

    public function delete(ArticlesCategory $category) {
        $category->delete();
        session()->flash('Proceed_status','Катеория новостей удалена');
        return redirect()->route('admin.categoriesList');
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
