<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
//        session()->start();
        session()->put('work_sector', url()->current());
        return view('admin.index', [
                'news' => Article::query()->orderBy('created_at', 'desc')->paginate(5)
            ]
        );
    }

}
