<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
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
}
