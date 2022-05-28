<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class FixAll
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        session(['LoggedUserInfo' => $data ]);

        return $next($request);
    }

}
