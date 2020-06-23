<?php

namespace App\Http\Controllers\Customer;

use App\Articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\NewsProcessRequest;
use App\NewsCategory;
use Illuminate\Http\Response;


class ArticlesController extends Controller
{
    public function index(int $category_id, int $id):string {
//        $new=DBConnService::selectSingleRow('SELECT * FROM v_news WHERE category_id=? AND id=?',[$category_id,$id]);
        $new=Articles::whereCategoryId($category_id)->where('id',$id)->first();
        if ($new==null) {
            abort(404,'Новость с таким идентификатором отсутствует');
        }
        return view('customer.article',['new'=>$new]);

    }

    public function add(int $category_id) {
        $categories=NewsCategory::orderBy('name')->get();

//        $category=DBConnService::selectSingleRow('SELECT id,name FROM news_categories WHERE id=?',[$category_id]);
//        if ($category==null||count($category)==0) {
//            abort(404);
//        }

        //$categories=DBConnService::selectRowsSet('SELECT id,name FROM news_categories ORDER BY name');

        return view('customer.article-add',[
            'id'=>$category_id,
            'categoryList'=>$categories
        ]);
    }

    public function insert(NewsProcessRequest $request) {
        $new=new Articles();
        $new->title=$request->get('title');
        $new->announcement=$request->get('announcement');
        $new->article_body=$request->get('article_body');
        $new->is_private=$request->get('is_private',0);
        $new->category_id=$request->get('category_id');
        $new->save();
        return redirect()->back();
    }
}
