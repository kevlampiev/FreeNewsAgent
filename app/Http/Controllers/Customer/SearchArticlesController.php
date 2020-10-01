<?php

namespace App\Http\Controllers\Customer;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchArticlesController extends Controller
{
    public function searchArticles(Request $request)
    {
//        dd($request);
        $searchStr=$request->post('searchStr');
        if (!$searchStr||$searchStr=='') {
            session()->flash('error_message','ЗАдан пустой поисковый запрос ... ');
            return redirect()->to(session()->get('work_sector'));
        } else {
            return view('customer.articles-search-result',[
                'news'=>Article::searchResult($searchStr)
            ]);

        }
    }

}
