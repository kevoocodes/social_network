<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function showRegisterPage() {
        return view('register');
    }

    public function userRegister(RegisterRequest $request) {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('welcome')->with('success', "Account successfully registered Please Login Here");
    }
}
