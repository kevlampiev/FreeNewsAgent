<?php

namespace App\Http\Controllers\Customer;

use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\NewsProcessRequest;
use App\Models\ArticlesCategory;
use Illuminate\Http\Response;


class ArticlesController extends Controller
{
    public function index(string $slug, int $id):string {
//        $new=DBConnService::selectSingleRow('SELECT * FROM v_news WHERE category_id=? AND id=?',[$category_id,$id]);
        $category=ArticlesCategory::whereSlug($slug)->first();
        if ($category==null) {
            abort(404,'Группы новостей $slug не существует');
        }
        $article=Articles::all()->where('category_id',$category->id)->where('id',$id)->first();
        if ($article==null) {
            abort(404,'Новость с таким идентификатором отсутствует');
        }
        return view('customer.article',['new'=>$article]);

    }

    //Вспомогательная функция, собирающая данные для редактирования/добавления статьи из формы ввода
    private function getFromForm(Articles $article, NewsProcessRequest $request) {
        $article->title=$request->get('title');
        $article->announcement=$request->get('announcement');
        $article->article_body=$request->get('article_body');
        $article->is_private=$request->get('is_private',0);
        $article->category_id=$request->get('category_id');
        $article->save();
    }

    public function add(string $slug) {
        $article = new Articles(); //Надеюсь garbage collector это уничтожит
        $category=ArticlesCategory::whereSlug($slug)->first();
        if ($category==null) {
            abort(404,'Группы новостей $slug не существует');
        }
        $categories=ArticlesCategory::orderBy('name')->get();
        return view('customer.article-add',[
            'id'=>$category->id,
            'categoryList'=>$categories,
            'article'=>$article
        ]);
    }

    public function insert(NewsProcessRequest $request) {
        $new=new Articles();
        $this->getFromForm($new, $request);
        session()->flash('proceed_status','Новость добавлена');
        return redirect()->back();
    }

    public function edit(string $slug, Articles $article) {
//        dd($article);
        $category=ArticlesCategory::whereSlug($slug)->first();
        if ($category==null) {
            abort(404,'Группы новостей $slug не существует');
        }
        $categories=ArticlesCategory::orderBy('name')->get();
        return view('customer.article-add',[
            'id'=>$article->category->id,
            'categoryList'=>$categories,
            'article'=>$article
        ]);
    }

    public function update(string $slug, Articles $article, NewsProcessRequest $request) {
        $this->getFromForm($article, $request);
        session()->flash('proceed_status','Новость изменена');
        return redirect()->route('articlesOfCategory',['slug'=>$slug]);
    }

    public function delete(string $slug, Articles $article) {
        $article->delete();
        session()->flash('Proceed_status','Новость удалена');
        return redirect()->route('articlesOfCategory',['slug'=>$slug]);
    }
}
