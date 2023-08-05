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
        $data['password'] = Hash::make($request->password);
        $data['password_confirm'] = $data['password'];
        $user = User::create($data);
        return redirect()->route('auth.login');
    }
    public function handleLogin(Login $request)
    {
        $data = $request->validated();
        $is_User = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (!$is_User) {
            return redirect()->back();
        }
        return redirect()->to('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('front'));
    }
}
