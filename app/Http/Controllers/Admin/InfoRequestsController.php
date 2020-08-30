<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info-request', ['irequests' => InfoRequest::query()->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.info-enquiery-form', ['ireq' => new InfoRequest()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infoReq = new InfoRequest();
//        dd($request);
        $infoReq->fill($request->except(['_token']))->save();
        session()->flash('proceed_status', 'Запрос направлен на обработку');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.info-enquiery-form', [
                'ireq' => InfoRequest::get()->where('id', $id)->first(),
                'id' => $id
            ]
        );
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $infoReq = InfoRequest::get()->where('id', $id)->first();
//        dd($infoReq);
        $infoReq->fill($request->except(['_token', 'id']))->save();
        session()->flash('proceed_status', 'Данные запроса обновлены');
        return redirect()->route('infoRequest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infoReq = InfoRequest::get()->where('id', $id)->first();
        $infoReq->delete();
        session()->flash('Proceed_status', 'Информаця о запросе удалена');

        return redirect()->route('infoRequest.index');
    }
}
