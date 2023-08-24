<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasSessionId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cartItems =  CartItems::where('sessionId', session()->getId())->select('sessionId')->first();
        if (session('cart') != null && $cartItems != null) {
            return $next($request);
        }
        return back();
    }
}
