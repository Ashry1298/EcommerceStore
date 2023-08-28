<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\CartItems;
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
        $sessionIds = CartItems::pluck('identifier')->toarray();
        $sessionIdentifer = session('identifier');
        if (Auth::attempt($request->validated())) {
            if (in_array($sessionIdentifer, $sessionIds)) {
                CartItems::where('identifier', $sessionIdentifer)->update(['sessionId' => session()->getId()]);
            }
            return redirect()->route('front');
        } else {
            session()->flash('error', 'Credinatials Are Not Correct!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $sessionIds = CartItems::pluck('identifier')->toarray();
        $sessionIdentifer = session('identifier');

        if (in_array($sessionIdentifer, $sessionIds)) {
            CartItems::where('identifier', $sessionIdentifer)->update(['sessionId' => session()->getId()]);
        }
        Auth::logout();
        return redirect(route('front'));
    }
}
