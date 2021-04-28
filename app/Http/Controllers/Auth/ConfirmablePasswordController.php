<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @param Request $request
     */
    public function show(Request $request)
    {
        if (auth()->user()->isAuthenticatedWithSocialLogin()) {
            $request->session()->put('auth.password_confirmed_at', time());

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        if (! auth()->user()->isAuthenticatedWithSocialLogin()) {
            if (!Auth::guard('web')->validate([
                'email' => $request->user()->email,
                'password' => $request->password,
            ])) {
                throw ValidationException::withMessages([
                    'password' => __('auth.password'),
                ]);
            }
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
