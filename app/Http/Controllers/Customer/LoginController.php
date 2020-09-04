<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

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

    public function responseFB(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('facebook')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'fb');
        Auth::login($userInSystem);

        return redirect()->route('home');
    }
}
