<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Models\NewsSources;
use Illuminate\Support\Facades\DB;

class InfoSourcesController extends Controller
{
    public function list()
    {
//        $sources=DB::table('news_sources')->get();
        $sources=NewsSources::all();
        return view('admin.sources', [
            'sources' => $sources
        ]);
    }
}
