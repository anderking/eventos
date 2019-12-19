<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
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
        if ($this->auth->check()) {
            
            if(Auth::user()->admin())
                return redirect('/admin/home');
            elseif(Auth::user()->recepcionista())
                return redirect('/recepcionista/home');
            elseif(Auth::user()->planificador())
                return redirect('/planificador/home');
            elseif(Auth::user()->coordinador())
                return redirect('/coordinador/home');
            elseif(Auth::user()->empleado())
                return redirect('/empleado/home');
            elseif(Auth::user()->cliente())
                return redirect('/cliente/home');
            elseif(Auth::user()->gerente())
                return redirect('/gerente/home');
        }

        return $next($request);
    }
}
