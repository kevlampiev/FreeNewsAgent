<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function list()
    {
        return view('admin.categories', [
            'categories' => ArticlesCategory::all()
        ]);
    }
}
