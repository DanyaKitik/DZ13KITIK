<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AuthController
{
    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()
            ->route('login')
            ->withErrors(['username' =>  'Logout']);
    }
    public function check(){
        $credentials =[
            'username' => request()->get('username'),
            'password' => request()->get('password')
        ];
        $remember = request()->get('remember') === 'on';
        if(!Auth::attempt($credentials,$remember)){
            return redirect()
                ->route('login')
                ->withErrors(['username' =>  'Invalid Username or Password.']);
        };
        return redirect()->route('home');
    }
}
