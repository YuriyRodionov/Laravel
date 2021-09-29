<?php

namespace App\Http\Controllers;

use App\Contract\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function startVk()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVk(Social $service)
    {
        try {
            return redirect($service->socialLogin(Socialite::driver('vkontakte')->user()));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

    }

    public function startFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(Social $service)
    {
        try {
            return redirect($service->socialLogin(Socialite::driver('facebook')->user()));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

    }
}
