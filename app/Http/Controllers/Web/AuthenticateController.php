<?php

namespace App\Http\Controllers\Web;

use View;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationAttemptRequest;

class AuthenticateController extends Controller
{
    public function login()
    {
        return View::make('auth.login');   
    }

    public function attempt(AuthenticationAttemptRequest $request)
    {
        $attempt = Auth::attempt($request->validated());

        if (! $attempt) {
            return Redirect::route('auth.login');
        }

        return Redirect::route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return Redirect::route('auth.login');
    }
}
