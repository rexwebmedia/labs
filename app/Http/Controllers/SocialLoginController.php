<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\AuthenticationException;
use App\Models\Team;


class SocialLoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $finduser = User::where('email', $googleUser->email)->first();
            if ($finduser) {
                // $finduser->saveAvatarImage($googleUser->avatar);
                // $finduser->email_verified_at = now();
                // $finduser->save();
                Auth::login($finduser);
                return redirect(RouteServiceProvider::HOME);
            } else {
                return redirect()->route('register')->withErrors(['email' => 'Account not found for login with Google']);
                $newUser = User::updateOrCreate([
                    'email' => $googleUser->email,
                ], [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'email_verified_at' => now(),
                ]);
                event(new Registered($newUser));

                $newTeam = Team::forceCreate([
                    'user_id' => $newUser->id,
                    'name' => explode(' ', $newUser->name, 2)[0]."'s Team",
                    'personal_team' => true,
                ]);
                $newTeam->save();
                $newUser->current_team_id = $newTeam->id;
                $newUser->save();

                Auth::login($newUser);
                // $newUser->saveAvatarImage($googleUser->avatar);
                // $newUser->saveUsername();
                return redirect(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            return response()->json([
                'errors' => [],
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
