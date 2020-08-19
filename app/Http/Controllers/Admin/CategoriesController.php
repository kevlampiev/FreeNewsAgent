<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCategory;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function index()
    {
        return view('admin.categories',['categories'=>ArticlesCategory::all()]);
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
//
//    public function delete(string $slug, Articles $article) {
//        $article->delete();
//        session()->flash('Proceed_status','Новость удалена');
//        return redirect()->route('admin.articlesOfCategory',['slug'=>$slug]);
//    }


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
