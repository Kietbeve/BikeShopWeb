<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nguoidung;
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.pages.login');
    }
    public function dashboard(){//test
        return view('admin.pages.dashboard');
    }
    public function logout(Request $request){//test
        $request->session()->put('admin',null);
        return redirect("/admin/login");
    }
    //LanSuaCuoi: 27/10/25 NguoiSua: TuanKiet
    //trang thai: Hoat dong tot voi checkLogin
    public function login(Request $request){//test
        $taikhoan=$request->taikhoan;
        $matkhau= $request->matkhau;
        $remember=$request->remember;
        $nguoidung =Nguoidung::checkLogin($taikhoan, $matkhau);
    //if ($nguoidung->chucvu=='admin') { sai vi neu $nguoidung null thi se ko thuoc model nguoidung
    if ($nguoidung) {
        // Lưu trạng thái đăng nhập vào session
        //if($remember){ chua biet xu li
            $request->session()->put('admin', $nguoidung); // luu taikhoan
        //}
        return redirect("/admin/dashboard");
    }
        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
    }

}
