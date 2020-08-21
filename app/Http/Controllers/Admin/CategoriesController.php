<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoSourcesRequest;
use App\Models\Articles;
use App\Models\ArticlesCategory;
use App\Http\Requests\CategoriesRequest;
use App\Models\InfoSources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{


    public function index()
    {
        $categories=ArticlesCategory::withCount('articles')->get();
        return view('admin.categories',['categories'=>$categories]);
    }

    private function getFromForm(InfoSources $source, InfoSourcesRequest $request)
    {
        $source->name=$request->get('name');
        $source->slug=$request->get('http_address');
        $source->description=$request->get('description');
        $source->save();
    }

    public function create()
    {
        $source=new InfoSources();
        return view('admin.sources',['source'=>$source]);
    }

    public function insert(InfoSourcesRequest $request)
    {
        $source=new InfoSources();
            $this->getFromForm($source, $request);
            session()->flash('proceed_status','Источник новостей добавлен');
            return redirect()->route('admin.sources');
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
