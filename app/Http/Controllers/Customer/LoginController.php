<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK()
    {
        $user = Socialite::driver('vkontakte')->user();
        dd($user);
    }

    public function loginFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFB()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
