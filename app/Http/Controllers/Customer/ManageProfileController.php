<?php


namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ManageProfileController extends Controller
{

    public function showPersonalAccount()
    {
        return view('customer.personal-account', ['user' => Auth::user()]);
    }

    public function updateAccountInfo(ProfileRequest $request)
    {
        $user = Auth::user();
        $errors = [];
        if (Hash::check($request->post('password'), $user->password)) {
            $user->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
            ]);
            if ($request->post('newPassword')) {
                $user['password'] = Hash::make($request->post('newPassword'));
            };
            $user->save();
            session()->flash('proceed_status', 'Данные пользователя обновлены');
        } else {
            $errors['password'][] = 'Неверно введен текущий пароль';
        }
        return redirect()->back()->withErrors($errors);
    }
}
