<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


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
        dd($user);

        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'fb');
        Auth::login($userInSystem);

        return redirect()->route('home');
    }
}
