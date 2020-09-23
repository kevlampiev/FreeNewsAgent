<?php


namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ManageProfileController extends Controller
{

    public function changePersonalAccount(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = Auth::user();
            $errors = [];

            if (!(Hash::check($request->post('password_conf'), $user->password))) {
                $errors['password_conf'][] = 'Неверно введен текущий пароль';
            }

            if ($request->post('newPassword1') != $request->post('newPassword2')) {
                $errors['newPassword1'][] = 'Введенные пароли не совпадают';
            } else {
                $user->password=Hash::make($request->post('newPassword1'));
            }

            if (count($errors) == 0) {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                ]);
                if ($request->post('newPassword')) {
                    if ($request->post('newPassword') == $request->post('newPassword'))
                        $user->password = Hash::make($request->post('newPassword'));
                };
                $user->save();
                session()->flash('proceed_status', 'Данные пользователя обновлены');
                return redirect()->back();
            } else {
                session()->flash('error_message', 'Не удалось обновить данные пользователя');
                return redirect()->back()->withErrors($errors);
            }
//            if (Hash::check($request->post('password_conf'), $user->password)) {
//                $user->fill([
//                    'name' => $request->post('name'),
//                    'email' => $request->post('email'),
//                ]);
//                if ($request->post('newPassword')) {
//                    if ($request->post('newPassword')==$request->post('newPassword'))
//                    $user->password = Hash::make($request->post('newPassword'));
//                };
//                $user->save();
//                session()->flash('proceed_status', 'Данные пользователя обновлены');
//            } else {
//                session()->flash('error_message', 'Текущий пароль неверен');
//                $errors['password'][] = 'Неверно введен текущий пароль';
//                return redirect()->back()->withErrors($errors);
//            }
//            return redirect()->route('home');
//        }
        }
        return view('customer.personal-account', ['user' => Auth::user()]);
    }
}
