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

    public function responseVK(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('vkontakte')->user();

        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, 'vk');

        Auth::login($userInSystem);

        return redirect()->route('home');
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

    public function loginGH()
    {
        return Socialite::driver('github')->redirect();
    }

    public function responseGH(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('github')->user();

        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        Auth::login($userInSystem);

        return redirect()->route('home');
    }
}
