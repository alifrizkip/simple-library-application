<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class VerifyRole
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $userRole = $this->auth->user()->role;

        // dd($userRole);

        if ($this->auth->guest()) {
            return redirect('/login');
        }elseif ($this->auth->user()->role != "admin") {
            return redirect('/');
        } /*elseif ($userRole == "admin") {
            return redirect('/book');
        }*/

        return $next($request);
    }
}
