<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        session()->start();
        session()->put('work_sector', 'admin');
        return view('admin.index', [
                'news' => Articles::query()->orderBy('created_at', 'desc')->paginate(5)
            ]
        );
    }
}
