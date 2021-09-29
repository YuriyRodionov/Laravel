<?php declare(strict_types=1);


namespace App\Services;


use App\Contract\Social;

use App\Http\Controllers\Auth\RegisterController;
use Laravel\Socialite\Contracts\User;
use App\Models\User as Model;

class SocialService implements Social
{
    public function socialLogin(User $user): string
    {

        $checkUser = Model::where('email', $user->getEmail())->first();

        if($checkUser) {
            $checkUser->name = $user->getName();
            $checkUser->avatar = $user->getAvatar();

            if($checkUser->save()) {
                \Auth::loginUsingId($checkUser->id);
                return route('account');
            }
        }

        else {
            $checkUser = Model::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => 12345678  //для примера
            ]);
            \Auth::loginUsingId($checkUser->id);
            return route('account');
        }



        throw new \Exception('Error Social Login');

    }

}
