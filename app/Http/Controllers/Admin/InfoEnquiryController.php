<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoEnquiery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class InfoEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info-enqueries', ['irequests' => InfoEnquiery::query()->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info-enquiery-form', ['ireq' => new InfoEnquiery(),'users'=>User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infoReq = new InfoEnquiery();
        $infoReq->fill($request->except(['_token']))->save();
        session()->flash('proceed_status', 'Запрос добавлен');
        return redirect()->route('infoEnquiries.index');
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
                'ireq' => InfoEnquiery::get()->where('id', $id)->first(),
//                'id' => $id
                'users' => User::all()
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
    public function update(Request $request, int $id)
    {
        $infoReq = InfoEnquiery::get()->where('id', $id)->first();
        $infoReq->fill($request->except(['_token']))->save();
        session()->flash('proceed_status', 'Данные запроса обновлены');
        return redirect()->route('infoEnquiries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infoReq = InfoEnquiery::get()->where('id', $id)->first();
        $infoReq->delete();
        session()->flash('Proceed_status', 'Информация о запросе удалена');

        return redirect()->route('infoEnquiries.index');
    }
}
