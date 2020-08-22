<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\InfoSourcesRequest;
use App\Models\InfoSources;
use Illuminate\Support\Facades\DB;

class InfoSourcesController extends Controller
{

    private function getFromForm(InfoSources $source, InfoSourcesRequest $request)
    {
        $source->name=$request->get('name');
        $source->http_address=$request->get('http_address');
        $source->description=$request->get('description');
        $source->save();
    }

    public function index()
    {
        $sources=InfoSources::all();
        return view('admin.sources', [
            'sources' => $sources
        ]);
    }

    public function create(InfoSourcesRequest $request)
    {
        $source = new InfoSources();
        return view('admin.source-add',['source'=>$source]);
    }

    public function insert(InfoSourcesRequest $request)
    {
        $source=new InfoSources();
        $this->getFromForm($source, $request);
        session()->flash('proceed_status','Источник новостей добавлен');
        return redirect()->route('admin.sources');
    }


    public function edit(InfoSources $source) {
        return view('admin.source-add',[
            'source'=>$source,
        ]);
    }

    public function update(InfoSources $source, InfoSourcesRequest $request) {
        $this->getFromForm($source, $request);
        session()->flash('proceed_status','Данные об источнике обновлены');
        return redirect()->route('admin.infoSourcesList');
    }

    public function delete(InfoSources $source) {
        $source->delete();
        session()->flash('Proceed_status','Источник новостей удален');
        return redirect()->route('admin.infoSourcesList');
    }



}
