<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){


        return view('admin.layout.index');
    }
    public function logout(){

        Auth::guard('admin')->logout();

        return redirect('admin/dangnhap');
    }
    public function getdangnhapAdmin(){
//        $admin=new Admin();
//        $admin->user_name="vocaotri";
//        $admin->email="vocaotri445@gmail.com";
//        $admin->password=bcrypt("Triadmin");
//        $admin->address=utf8_encode("32-Bình Giã-Phường 13-Quận Tân Bình-TPHCM");
//        $admin->phone="0336365042";
//        $admin->status=1;
//        $admin->save();

        return view('admin.dangnhap');
    }
    public function postdangnhapAdmin(Request $req){

        if (Auth::guard('admin')->attempt(['user_name'=>$req->name,'password'=>$req->pass,'status'=>1])) {
            return redirect("admin/");
        }
        else if (Auth::guard('admin')->attempt(['user_name'=>$req->name,'password'=>$req->pass,'status'=>0])){
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công tài khoản này đã bị khóa!!!');
        }else{
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công!!!');
        }

    }
}
