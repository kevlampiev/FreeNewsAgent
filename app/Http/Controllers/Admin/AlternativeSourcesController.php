<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Models\InfoSourcesAlternative;
use Illuminate\Support\Facades\DB;

class AlternativeSourcesController extends Controller
{
    public function list()
    {
        return view('admin.alternative-sources', [
            'sources' => InfoSourcesAlternative::getAll()
        ]);
    }

    private function getFromForm()
    {
        return new InfoSourcesAlternative(
            request()->get('name', ''),
            request()->get('url', 'https://google.com'),
            request()->get('description', ''));
    }

    public function create()
    {
        $source = new InfoSourcesAlternative();
        if (request()->isMethod('GET')) {
            return view('admin.alternative-source-add', [
                'source' => $source]);
        } else {
            InfoSourcesAlternative::addSource($this->getFromForm());
            return redirect()->route('admin.alternativeSourcesList');
        }
    }

    public function edit($id)
    {
        if (request()->isMethod('GET')) {
            return view('admin.alternative-source-add', ['source' => InfoSourcesAlternative::getOne((int)$id)]);
        } else {
            InfoSourcesAlternative::editSource($id, $this->getFromForm());
            return redirect()->route('admin.alternativeSourcesList');
        }
    }

    public function delete($id)
    {
        InfoSourcesAlternative::deleteSource($id);
        return redirect()->route('admin.alternativeSourcesList');
    }


}
