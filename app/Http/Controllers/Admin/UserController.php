<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoEnquiery;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users')->with('users', User::where('id', '!=', Auth::id())
            ->paginate(15)
        );
    }

    public function switchRole(Request $request)
    {
        $user = User::where('id', $request->post('id'))->first();
        if ($user->type_auth = 'site') {
            $user->is_admin = !$user->is_admin;
            $user->save();
        } else {
            session()->flash('error_status', 'Статус пользователя, зарегистрированного через соцсети не может быть изменен');
        }
        return back();
    }

    public function create()
    {
        $user = new User();
        $user->type_auth = 'site';
        return view('admin.user-add')->with('user', $user);
    }

    public function insert(Request $request)
    {
        $source = new User();
        $source->fill($request->toArray());
        $source->save();
        session()->flash('proceed_status', 'Пользователь добавлен');
        return redirect()->route('admin.usersList');
    }

    public function edit(User $user)
    {
        return view('admin.user-add', ['user' => $user]);
    }


    public function update(User $user, Request $request)
    {
        $user->fill($request->all());
        $user->save();
        session()->flash('proceed_status', 'Данные пользователя обновлены');
        return redirect()->route('admin.usersList');
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            session()->flash('proceed_status', 'Пользователь удален');
        } catch (\Exception $e) {
            session()->flash('error_message', "Невозможно удалить пользователя: {$e->getMessage()}");
        }
        return back();
    }


}
