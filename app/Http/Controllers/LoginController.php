<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginPage() {
        return view('welcome');
    }

    public function userLogin(LoginRequest $request) {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('/welcome')->withErrors('auth.failed');
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
        
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->intended('/dashboard');
    }
}
