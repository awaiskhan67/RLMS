<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login1');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
       
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user's account is active
        if ($user && $user->active_status == 1) {
            // Regenerate the session and redirect
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // Log the user out and display an error message
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => __('Your account is not active.'),
            ]);
        }


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
