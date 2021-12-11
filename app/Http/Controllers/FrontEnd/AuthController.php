<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(){
        $view = view('frontend.login');
        return $view;
    }

    public function loginStore(Request $request){
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)){
            return redirect()->route('frontend.home');
        }
        return 'ok';
    }

    public function register(Request $request){
        $view = view('frontend.register');
        return $view;
    }

    public function registerStore(Request $request){
        $data = $request->only(['name', 'email', 'password']);
        return $data;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('frontend.home');
    }

}
