<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CauHoi;
use App\Models\DeThi;
use App\Models\History;
use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $view = view('frontend.home');
        return $view;
    }


    public function gioithieu()
    {
        $view = view('frontend.gioithieu');
        return $view;
    }


    public function lophoc()
    {
        $lophoc = LopHoc::get();
        $view = view('frontend.lophoc');
        if (request('q')){
            $q = request('q');
            $lophoc = LopHoc::where('TenLop','like', '%'.$q.'%')->orWhere('TenHocPhan','like', '%'.$q.'%')->where('MoTa','like', '%'.$q.'%')->get();
        }
        $view->with('lophoc', $lophoc);
        return $view;
    }

    public function dangkylophoc($id)
    {
        $lophoc = LopHoc::find($id);
        $lophoc->sinhVien()->attach(Auth::id());
        return redirect()->back()->with('msg', 'Đăng ký vào lớp thành công');
    }

    public function huylophoc($id)
    {
        $lophoc = LopHoc::find($id);
        $lophoc->sinhVien()->detach(Auth::id());
        return redirect()->back()->with('msg', 'Hủy lớp thành công');
    }

    public function baithi()
    {
        $sinhvien = Auth::user();
        $dethi = $sinhvien->lopHoc()->get();
        $view = view('frontend.baithi');
        $view->with('dethi', $dethi);
        return $view;
    }

    public function profile()
    {
        $user = \Auth::user();
        $view = view('frontend.profile');
        return $view;

    }

    public function lambaithi(Request $request,$id_lophoc, $id_dethi)
    {
        $dethi = DeThi::with('cauHoi')->find($id_dethi);
        $view = view('frontend.lambaithi');
        if (request('kq') == 'nopbai'){
            $data = $request->except(['_token','_method']);
            $cauHoi = $dethi->cauHoi;
            $points = 0;
            $point = 100/count($cauHoi);
            foreach ($data as $value) {
                $dap_an = preg_replace('/[^A-Z]/', '', $value);
                $id = preg_replace('/(_.+?)/', '', $value);
                $key = preg_replace('/(.+?_)/', '', $value);
                if (!$key){
                    $key = 0;
                }
                if ($dap_an && $id){
                    $cauHoi[$key]->DapAnChon = $dap_an;
                    if (CauHoi::where('id', $id)->where('DapAn', $dap_an)->first()){
                        $cauHoi[$key]->success = true;
                        $points = $points + $point;
                    }
                }
            }
            $view->with('points',round($points, 2));
            $view->with('point',round($point, 2));

            if (History::where('sinh_vien_id', Auth::id())->where('lop_hoc_id', $id_lophoc)->where('de_thi_id', $dethi->id)->exists()){
                return redirect()->back()->with('msg', 'Bạn không thể nộp bài 2 lần');
            }
            History::create([
                'sinh_vien_id' => Auth::id(),
                'lop_hoc_id' => $id_lophoc,
                'de_thi_id' => $dethi->id,
//                'dap_an_chon' => '',
                'diem_so' => round($points, 2)
            ]);
        }
        $view->with('dethi', $dethi);
        $view->with('id_lophoc', $id_lophoc);
        return $view;
    }

//    public function nopbai(Request $request)
//    {
//        $data = $request->except(['_token','_method']);
//        foreach ($data as $value){
//            $dap_an = preg_replace( '/[^A-Z]/', '', $value );
//            $id = preg_replace( '/[^0-9]/', '', $value );
//            $id = preg_replace( '/[^0-9]/', '', $value );
//            $cauhoi = CauHoi::where('id', $id)->where('DapAn', $dap_an)->first();
//            dd($cauhoi);
//        }
//    }
}
