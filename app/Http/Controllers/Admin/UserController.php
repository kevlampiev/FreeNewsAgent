<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoEnquiery;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users', ['users' => User::query()->paginate(15)]);
    }

    public function switchRole(Request $request) {
        $user=User::where('id',$request->post('id'))->first();
        $user->is_admin==!$user->is_admin;
        $user->save();
        return view('admin.users', ['users' => User::query()->paginate(15)]);
    }


}
