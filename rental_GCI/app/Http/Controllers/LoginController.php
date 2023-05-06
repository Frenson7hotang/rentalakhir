<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class LoginController extends Controller
{
    public function login() {
        return view ('login');
    }

    public function loginproses(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            Alert::success('Congrats', 'You\'ve Successfully SignIn');
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function register() {
        return view ('register');
    }

    public function registeruser(Request $request) {
        // return view ('register');
        // dd($request->all());
        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' =>bcrypt( $request -> password),
            'remember_token' => Str::random(60)
        ]);
        Alert::success('Congrats', 'You\'ve Successfully SignIn');
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        Alert::success('Selamat', 'Kamu Berhasil Logout!!');
        return redirect('login');
    }
}
