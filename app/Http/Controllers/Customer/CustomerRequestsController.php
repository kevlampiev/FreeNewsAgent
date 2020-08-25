<?php

namespace App\Http\Controllers\Customer;

use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TmpServices\DBConnService;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\InfoEnquieryRequest;
use App\Http\Requests\NewsRequest;
use App\Models\ArticlesCategory;
use Illuminate\Http\Response;


class CustomerRequestsController extends Controller
{
    public function addFeedback()
    {
        return view('customer.feedback-form');
    }

    public function storeFeedback(FeedbackRequest $request)
    {
        $data = $request->only(['username', 'feedback']);
        $data['created_at'] = date("l dS of F Y h:I:s A");
        file_put_contents(storage_path('app/feedbacks.txt'), implode(';', $data) . '/10/13', FILE_APPEND);
        return redirect()->route('home');
    }

    public function getInfoEnquiery()
    {
        return view('customer.info-enquiery-form');
    }

    public function storeInfoEnquiery(InfoEnquieryRequest $request)
    {
        $data = $request->only(['username', 'phone', 'email', 'description']);
        $data['created_at'] = date("l dS of F Y h:I:s A");
        file_put_contents(storage_path('app/info-requestes.txt'), implode(';', $data) . '/10/13', FILE_APPEND);
        return redirect()->route('home');
    }
}
