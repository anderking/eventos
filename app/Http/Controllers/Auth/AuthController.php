<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectPath = '/admin/home'; //si las credenciales son correctas
    protected $loginPath = '/login'; //Si las credenciales no son correctas
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getLogin(){
        return view('auth.login');
    }

    public function getlogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function redirectPath()
    {
        if ( Auth::user()->admin() )
        {
            return '/admin/home';
        }
        else if( Auth::user()->recepcionista() )
        {
            return '/recepcionista/home';
        }
        else if( Auth::user()->planificador() )
        {
            return '/planificador/home';
        }
        else if( Auth::user()->coordinador() )
        {
            return '/coordinador/home';
        }
        else if( Auth::user()->empleado() )
        {
            return '/empleado/home';
        }
        else if( Auth::user()->cliente() )
        {
            return '/cliente/home';
        }
        else if( Auth::user()->gerente() )
        {
            return '/gerente/home';
        }
    }
}
