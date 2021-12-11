<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $view = view('frontend.home');
        return $view;
    }



    public function gioithieu(){
        $view = view('frontend.gioithieu');
        return $view;
    }


    public function lophoc(){
        $lophoc = LopHoc::get();
        $view = view('frontend.lophoc');
        $view->with('lophoc',$lophoc);
        return $view;
    }

    public function dangkylophoc($id){
        $lophoc = LopHoc::find($id);
        $lophoc->sinhVien()->attach(Auth::id());
        return redirect()->back()->with('msg', 'Đăng ký vào lớp thành công');
    }

    public function huylophoc($id){
        $lophoc = LopHoc::find($id);
        $lophoc->sinhVien()->detach(Auth::id());
        return redirect()->back()->with('msg', 'Hủy lớp thành công');
    }

    public function baithi(){
        $sinhvien = Auth::user();
        $dethi = $sinhvien->lopHoc()->get();
        $view = view('frontend.baithi');
        $view->with('dethi', $dethi);
        return $view;
    }
}
