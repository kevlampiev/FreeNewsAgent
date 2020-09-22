<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\InfoSourcesRequest;
use App\Models\InfoSource;
use Illuminate\Support\Facades\DB;

class InfoSourceController extends Controller
{

    public function index()
    {
        $sources = InfoSource::withCount('articles')->get();
        return view('admin.sources', [
            'sources' => $sources
        ]);
    }

    public function create()
    {
//        dd($request);
        $source = new InfoSource();
        return view('admin.source-add', ['source' => $source]);
    }

    public function insert(InfoSourcesRequest $request)
    {
        $source = new InfoSource();
        $source->fill($request->toArray());
        $source->save();
        session()->flash('proceed_status', 'Источник новостей добавлен');
        return redirect()->route('admin.infoSourcesList');
    }


    public function edit(InfoSource $source)
    {
        return view('admin.source-add', [
            'source' => $source,
        ]);
    }

    public function update(InfoSource $source, InfoSourcesRequest $request)
    {
//        dd($source);
        $source->fill($request->except('_token'));
//            dd($source);
        $source->save();
        session()->flash('proceed_status', 'Данные об источнике обновлены');
        return redirect()->route('admin.infoSourcesList');
    }

    public function delete(InfoSource $source)
    {
        $source->delete();
        session()->flash('proceed_status', 'Источник новостей удален');
        return redirect()->route('admin.infoSourcesList');
    }


}
