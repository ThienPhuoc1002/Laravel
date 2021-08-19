<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class CusController extends Controller
{
    public function login(Request $request){
        $email = $request['email'];
        $password = $request['password']; 
        $credentials =  array('email'=>$request->email,'password'=>$request->password);
        $this->validate($request,
        
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);
        if (Auth::guard('customer')->attempt($credentials))
        {
            $tk = DB::table('users')->where('email',$email)->first();
            session()->put('admintk', $tk);
            if ($tk['email']='htphuoc.18i@cit.udn.com')
                return redirect('/loai');
            else
                return redirect('/giohang');
        }
            
        else
            return redirect()->back()->withErrors(['msg'=>'Đăng nhập thất bại']);
    }

    public function register(Request $req){
        $this->validate($req,
        [
            'username'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',        
            'address'=>'required',
            'phone'=>'required',
            're_password'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'username.required'=>'Vui lòng nhập tên',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập username',
            'password.required'=>'Vui lòng nhập mật khẩu',
            're_password.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu phải ít nhất 6 ký tự'
        ]);
        $user = new User();
        $user->full_name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);   
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function logout(Request $req){
        session()->flush();
        return redirect('/login');
    }    
}
