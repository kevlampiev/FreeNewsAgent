<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
//use App\Models\InfoSourcesToKill;
use Illuminate\Support\Facades\DB;

class InfoSourcesController extends Controller
{
    public function list()
    {
        $sources=DB::table('news_sources')->get();

        return view('customer.sources', [
            'sources' => $sources
        ]);
    }

//    public function listToKill()
//    {
//        $sources=InfoSourcesToKill::getAll();
//
//        return view('customer.sourcesToKill', [
//            'infoSources' => $sources
//        ]);
//    }
}
