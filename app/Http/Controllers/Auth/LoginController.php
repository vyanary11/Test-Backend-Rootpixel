<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:dashboard')->except(['logout']);
    }

    private function messages()
    {
        return [
            'email.required' => 'Email wajib disi !!',
            'email.email' => 'Email tidak valid contoh:nduwegawe@email.com',
            'password.required' => 'Password wajib disi !!',
            'password.min' => 'Password harus lebih dari 6 karakter !!',
        ];
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ], $this->messages());

        if (Auth::guard('dashboard')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/dashboard');
        }else{
            return back()->withInput($request->only('email', 'remember'))->with('msg', [
                'type'      => 'danger',
                'message'   => 'Email atau password anda tidak valid !!'
            ]);
        }
    }

    public function logout(Request $request) {
        Auth::guard('dashboard')->logout();
        return redirect('dashboard');
    }
}
