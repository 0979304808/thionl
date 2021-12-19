<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\User;
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
        return redirect()->route('frontend.login');
    }

    public function register(Request $request){
        $view = view('frontend.register');
        return $view;
    }

    public function registerStore(Request $request){
        $data = $request->only(['masv','name', 'email', 'password']);
        if (User::where('email', $data['email'])->exists()){
            return redirect()->back()->with('msg', 'Email đã tồn tại');
        }
        if (User::where('masv', $data['masv'])->exists()){
            return redirect()->back()->with('msg', 'Mã sinh viên đã tồn tại');
        }
        $user = User::create($data);
        if ($user){
            return redirect()->back()->with('msg', 'đăng ký thành công');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('frontend.home');
    }

}
