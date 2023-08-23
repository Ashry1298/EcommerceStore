<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Login;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function handleRegister(Register $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('front');
    }
    public function handleLogin(Login $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('front');
        } else {
            session()->flash('error', 'Credinatials Are Not Correct!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('front'));
    }
}
