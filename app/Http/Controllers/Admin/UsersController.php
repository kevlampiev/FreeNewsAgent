<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoEnquiery;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
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
        if ($user->is_admin==1) {
            $user->is_admin=0;
        } else {
            $user->is_admin=1;
        }
        $user->save();
        return view('admin.users', ['users' => User::query()->paginate(15)]);
    }


}
