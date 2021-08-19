<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\News;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class AuthController extends Controller
{
    public function dangnhap(){
        if (session()->has('admintk'))
            if (session()->get('admintk')->quyen == 0)
                return redirect('/khachhang');
            else
                return redirect('/admin');
        else
            return view('dangnhap');
    }


    public function dangky(){
        if (session()->has('admintk'))
            if (session()->get('admintk')->quyen == 0)
                return redirect('/khachhang');
            else
                return redirect('/admin');
        else
            return view('dangky');
    }

    public function addimg(Request $request){
        $tk = User::find(session()->get('admintk')->id);      
        $tk->hinhanh = $request->hinhanh;     
        $tk->save();
        session()->forget('admintk');
        session()->put('admintk', $tk);
        return redirect('/adminprofile'); 
    }

    public function adminprofile(Request $request){
        $city = City::all();
        $province = Province::all();
        $wards = Wards::all();
        return view('admin.profile',[
            'city'=>$city,
            'province'=>$province,
            'wards'=>$wards
        ]); 
    }

    public function addtt(Request $request){
        $tk = User::find(session()->get('admintk')->id);      
        $tk->full_name = $request->name;
        $tk->email = $request->email; 
        $tk->address = $request->address;
        $tk->matp = $request->city; 
        $tk->maqh = $request->province; 
        $tk->xaid = $request->wards; 
        $tk->phone = $request->phone;     
        $tk->save();
        session()->forget('admintk');
        session()->put('admintk', $tk);
        return redirect('/adminprofile'); 
    }

    public function editcus(Request $request){
        $tk = User::find(session()->get('admintk')->id);      
        $tk->full_name = $request->name1;
        $tk->email = $request->email1; 
        $tk->address = $request->address1;
        $tk->phone = $request->phone1;   
        $tk->matp = $request->city; 
        $tk->maqh = $request->province; 
        $tk->xaid = $request->wards;   
        $tk->save();
        session()->forget('admintk');
        session()->put('admintk', $tk);
        return redirect()->back(); 
    }

    public function admintintuc(){
        if (session()->get('admintk')->quyen==1){
            $news = DB::table('news')->get();
            return view('admin.tintuc',[
                'news'=>$news
            ]);
        }
            return view('admin.tintuc'); 
        $tk = User::find(session()->get('admintk')->id);      
        $tk->full_name = $request->name1;
        $tk->email = $request->email1; 
        $tk->address = $request->address1;
        $tk->phone = $request->phone1;     
        $tk->save();
        session()->forget('admintk');
        session()->put('admintk', $tk);
        return redirect()->back(); 
    }

    public function themtintuc(){
        if (session()->get('admintk')->quyen==1)
            return view('admin.themtintuc'); 
    }

    public function addtintuc(Request $req){
        $tt = new News();
        $tt->noidung = $req->noidung;
        $tt->chitiet = $req->chitiet;
        $tt->hinhanh = $req->hinhanh;   
        $tt->ngay = date('Y-m-d');;
        $tt->save();
        return redirect('/admintintuc')->withErrors(['msg'=>'Đã thêm tin tức mới']); 
    }

    public function edittintuc(Request $req, $id){
        $new = News::find($id);   
        return view('/admin.edittintuc',[
            'new'=>$new
        ]);
    }

    public function suatintuc(Request $req, $id){
        $tt = News::find($id);  
        $tt->noidung = $req->noidung;
        $tt->chitiet = $req->chitiet;
        $tt->hinhanh = $req->hinhanh;   
        $tt->ngay = date('Y-m-d');;
        $tt->save();
        return redirect('/admintintuc')->withErrors(['msg'=>'Đã sửa tin tức']); 
    }

    public function savepass(Request $request){
        $tk = User::find(session()->get('admintk')->id);  
        $email = session()->get('admintk')->email;
        $credentials =  array('email'=>$email,'password'=>$request->old);
        $this->validate($request,
        [
            'old'=>'required',
            'new'=>'required|min:6|max:20',
            're_new'=>'required|same:new'
        ],
        [
            'old.required'=>'Vui lòng nhập mật khẩu cũ',
            'new.required'=>'Vui lòng nhập mật khẩu mới',
            're_new.required'=>'Vui lòng nhập xác nhận mật khẩu',
            're_new.same'=>'Mật khẩu không giống nhau',
            'new.min'=>'Mật khẩu phải ít nhất 6 ký tự',
            'new.max'=>'Mật khẩu không được quá 20 ký tự'
        ]);
        if (Auth::attempt($credentials))
        {
            $tk->password = Hash::make($request->new);   
            $tk->save();
            session()->forget('admintk');
            session()->put('admintk', $tk);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công'); 
        }         
        else
            return redirect()->back()->withErrors(['msg'=>'Mật khẩu không đúng']);   
    }

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
        if (Auth::attempt($credentials))
        {
            $tk = DB::table('users')->where('email',$email)->first();
            session()->put('admintk', $tk);
            if (session()->get('admintk')->quyen == '1')
                return redirect('/admin');
            else
                return redirect('/khachhang');
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
        $user->matp = 1;
        $user->maqh = 1;
        $user->xaid = 1;
        $user->phone = $req->phone;
        $user->quyen = 0;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function logout(Request $req){
        session()->flush();
        return redirect('/trangchu');
    }    
}
