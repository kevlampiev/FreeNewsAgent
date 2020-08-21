<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Models\InfoSources;
use Illuminate\Support\Facades\DB;

class InfoSourcesController extends Controller
{
    public function index()
    {
        $sources=InfoSources::all();
        return view('admin.sources', [
            'sources' => $sources
        ]);
    }


}
