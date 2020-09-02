<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\InfoSourcesRequest;
use App\Models\InfoSources;
use Illuminate\Support\Facades\DB;

class InfoSourceController extends Controller
{

//    private function getFromForm(InfoSources $source, InfoSourcesRequest $request)
//    {
//        $source->name=$request->get('name');
//        $source->http_address=$request->get('http_address');
//        $source->description=$request->get('description');
//        $source->save();
//    }

    public function index()
    {
        $sources = InfoSources::all();
        return view('admin.sources', [
            'sources' => $sources
        ]);
    }

    public function create()
    {
//        dd($request);
        $source = new InfoSources();
        return view('admin.source-add', ['source' => $source]);
    }

    public function insert(InfoSourcesRequest $request)
    {
        $source = new InfoSources();
        $source->fill($request->toArray())->save();
        session()->flash('proceed_status', 'Источник новостей добавлен');
        return redirect()->route('admin.infoSourcesList');
    }


    public function edit(InfoSources $source)
    {
        return view('admin.source-add', [
            'source' => $source,
        ]);
    }

    public function update(InfoSources $source, InfoSourcesRequest $request)
    {
        $source->fill($request->toArray())->save();
        session()->flash('proceed_status', 'Данные об источнике обновлены');
        return redirect()->route('admin.infoSourcesList');
    }

    public function delete(InfoSources $source)
    {
        $source->delete();
        session()->flash('proceed_status', 'Источник новостей удален');
        return redirect()->route('admin.infoSourcesList');
    }


}
