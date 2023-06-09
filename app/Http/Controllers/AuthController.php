<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }

        public function authenticate(Request $request)
    {

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential)){
            $user = Auth::user()->name;
                return redirect('posts');
        } else {
                return redirect('login');
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function register_form() {
        return view('auth.register');
    }

    public function register (RegisterRequest $request) {
        User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        ]);

        return redirect('posts');
    }

}
