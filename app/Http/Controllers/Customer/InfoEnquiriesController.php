<?php

namespace App\Http\Controllers\Customer;

use App\Models\InfoEnquiery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoEnquiriesController extends Controller
{
    public function create()
    {
        return view('customer.info-enquiery-form', ['ireq' => new InfoEnquiery()]);
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
        return redirect()->route('home');
    }

}
