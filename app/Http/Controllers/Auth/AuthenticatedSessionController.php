<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @throws ValidationException
     */
    public function handleProviderCallback($provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();

        /**
         * The final query will be:
         * select * from `users` where `email` = ? and ((`provider` is null or `provider` <> ?) or (`provider_id` is null or `provider_id` <> ?))
         */
        $registeredUser = User::whereEmail($socialiteUser->getEmail())
                            ->whereRaw(
                                '((`provider` is null or `provider` <> ?) or (`provider_id` is null or `provider_id` <> ?))',
                                [$provider, $socialiteUser->getId()]
                            )->first();

        if ($registeredUser) {
            return redirect()->intended(route('login'))
                ->withErrors(['email' => __('auth.wrong_method')]);
        }

        $user = User::firstOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $socialiteUser->getId(),
            ],
            [
                'email' => $socialiteUser->getEmail(),
                'nickname' => $socialiteUser->getNickname(),
                'name' => $socialiteUser->getName(),
                'avatar' => $socialiteUser->getAvatar(),
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'provider' => $provider,
                'provider_id' => $socialiteUser->getId(),
            ]
        );

        auth()->login($user, true);

        request()->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('games.index'));
    }
}
