<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'title'     => 'Login | Antrian Obat',

            'style'     => [
                'login'
            ],

            'script'    => []
        ];

        return view('auth.login', $data);
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

        // dd(auth()->user());


        if (auth()->user()->role === 'admin') {
            return redirect('/admin');
        }

        if (auth()->user()->role === 'dokter') {
            return redirect('/dokter');
        }

        if (auth()->user()->role === 'apoteker') {
            return redirect('/apoteker');
        }

        if (auth()->user()->role === 'cs') {
            return redirect('/customer-service');
        }
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

        return redirect('/');
    }
}
