<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * This method initiates the OAuth flow by redirecting the user to Twitter
     * so they can authorize the application.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse A redirect response to Twitter's auth page.
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter after authentication.
     *
     * This method is the callback URL that Twitter redirects to after the user
     * has authenticated. It retrieves the user's details, finds or creates a
     * corresponding user in the local database, and logs them in.
     *
     * @return \Illuminate\Http\RedirectResponse A redirect response to the intended page or home.
     */
    public function handleProviderCallback()
    {
        try {
            $providerUser = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Failed to authenticate with Twitter.']);
        }

        // Find or create the user
        $user = User::firstOrCreate(
            ['email' => $providerUser->getEmail()],
            ['name' => $providerUser->getName()]
        );

        // Create or update the social account
        $user->socialAccounts()->updateOrCreate(
            [
                'provider_name' => 'twitter',
                'provider_id' => $providerUser->getId(),
            ],
            [
                'token' => $providerUser->token,
                'refresh_token' => $providerUser->refreshToken,
                'expires_at' => $providerUser->expiresIn ? now()->addSeconds($providerUser->expiresIn) : null,
            ]
        );

        Auth::login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
