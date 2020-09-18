<?php

namespace App\Http\Controllers\Customer;

use App\Models\InfoEnquiery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoEnquiryController extends Controller
{
    public function create()
    {
        $infoEnq = new InfoEnquiery();
        $infoEnq->user_id = Auth::user()->id;
        return view('customer.info-enquiery-form', ['ireq' => $infoEnq]);
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
