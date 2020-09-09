<?php


namespace App\Repositories;

use App\User;
use \Laravel\Socialite\Contracts\User as UserOAuth;;

class UserRepository
{

    public function getUserBySocId(UserOAuth $user, string $socName)
    {
        $userInSystemBuilder = User::query()
            ->orWhere([['id_in_soc','=',$user->id],['type_auth', '=',$socName]] );
//            ->orWhere('email',$user->getEmail())
//            ->first();
        if (!empty($user->getEmail())) {
            $userInSystemBuilder->orWhere('email',$user->getEmail());
        }

        $userInSystem=$userInSystemBuilder->first();

        if (empty($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => $user->email,
                'password' => '',
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : '',
            ]);

            $userInSystem->save();
        } else {
            $userInSystem->id_in_soc=$user->getId();
            $userInSystem->type_auth=$socName;
            $userInSystem->name=$user->getName();
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
