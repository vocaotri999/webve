<?php

namespace App\Http\Controllers;

use App\User;
use App\UserManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDanhSach(){
        $user=User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
        return view('admin.user.them');
    }
    public function getSua($id)
    {
        $user=User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function getXoa($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/ManagerUser/danhsach')->with('thongbao','Xóa tài khoản User thành công');
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:users,email',
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
        $user=new User;
        $user->full_name=$request->fullname;
        $user->user_name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->address=$request->address;
        $user->phone=$request->SDT;
        $user->status=1;
        $user->save();
        return redirect('admin/ManagerUser/danhsach')->with('thongbao','Thêm user thành công');
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự'
        ]);
        $user=UserManager::find($id);
        $user->full_name=$request->fullname;
        $user->user_name=$request->name;
        $user->status=$request->status;
        $user->address=$request->address;
        $user->phone=$request->phone;

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
            $user->password=bcrypt($request->password);
        }

      $user->save();
       return redirect('admin/ManagerUser/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
}
