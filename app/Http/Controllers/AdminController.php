<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminManager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDanhSach(){
        $admin=Admin::all();
        return view('admin.admin.danhsach',['admin'=>$admin]);
    }
    public function getThem(){
        return view('admin.admin.them');
    }
    public function getSua($id)
    {
        $admin=Admin::find($id);
        return view('admin.admin.sua',['admin'=>$admin]);
    }
    public function getXoa($id)
    {
        if ($id==1){
            return redirect('admin/ManagerAdmin/danhsach')->with('thongbao','Không thể xóa tài khoản này');
        }
        else{
            $admin=Admin::find($id);
            if (!isset($admin)){
                return redirect('admin/ManagerAdmin/danhsach')->with('thongbao','Tài khoản này không tồn tại');
            }
            else{
                $admin->delete();
                return redirect('admin/ManagerAdmin/danhsach')->with('thongbao','Xóa tài khoản Admin thành công');
            }

        }
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:admin,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định danh email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự nhiều nhất 32 ký tự',
            'password.max'=>'Mật khẩu tối đa 32 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain'=>'Mật khẩu nhập lại chưa đúng'
        ]);
        $admin=new Admin;
        $admin->user_name=$request->name;
        $admin->email=$request->email;
        $admin->password=bcrypt($request->password);
        $admin->address=$request->address;
        $admin->phone=$request->SDT;
        $admin->status=1;
        $admin->save();
        return redirect('admin/ManagerAdmin/danhsach')->with('thongbao','Thêm admin thành công');
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự'
        ]);
        $admin=Admin::find($id);
        $admin->user_name=$request->name;
        $admin->status=$request->status;
        $admin->address=$request->address;
        $admin->phone=$request->phone;
        if($request->changePassword == "on"){
            $this->validate($request,[
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự nhiều nhất 32 ký tự',
                'password.max'=>'Mật khẩu tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
            ]);
            $admin->password=bcrypt($request->password);
        }
        $admin->save();
        return redirect('admin/ManagerAdmin/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
}
