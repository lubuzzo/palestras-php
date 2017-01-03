<?php

namespace SeCoT\Http\Controllers;

use Illuminate\Http\Request;

use SeCoT\Http\Requests;
use SeCoT\Http\Controllers\Controller;
use SeCoT\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));
        auth()->login($user);

        return redirect()->to('/');
    }
}
