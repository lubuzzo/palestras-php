<?php

namespace SeCoT;

use Laravel\Socialite\Contracts\Provider;
use SeCoT\Mail\Cadastro;
use Illuminate\Support\Facades\Mail;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            $QR_Code = str_random(12);
            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(str_random()),
                    'id_qr' => $QR_Code,
                    'nivel' => 0,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            Mail::to($providerUser->getEmail())->send(new Cadastro($providerUser->getName(), $QR_Code));

            return $user;

        }

    }
}
