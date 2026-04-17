<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationAPI
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->get('token')) {
            return redirect()->route('login');
        }

        $user = User::where('token', $request->get('token'))->first();
        if (!$user) {
            return redirect()->route('login');
        }

        $request->attributes->add(['user' => $user]);
        return $next($request);
    }
}
