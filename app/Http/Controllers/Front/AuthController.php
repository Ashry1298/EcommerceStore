<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->back();
        }
        return redirect()->to('/')->with('Authentication Error', 'Credinatiols Are Not Correct');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('front'));
    }
}
