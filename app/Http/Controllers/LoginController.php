<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/en';

    protected function redirectTo()
    {
        return '/en';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt($request->only('email', 'password'), true)) {
            return redirect()
                ->intended(url('/en'))
                ->with('status', 'You are Logged in as Customer!');
        }
    }


}
