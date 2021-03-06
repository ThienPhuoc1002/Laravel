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
        return redirect('/admintintuc')->withErrors(['msg'=>'???? th??m tin t???c m???i']); 
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
        return redirect('/admintintuc')->withErrors(['msg'=>'???? s???a tin t???c']); 
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
            'old.required'=>'Vui l??ng nh???p m???t kh???u c??',
            'new.required'=>'Vui l??ng nh???p m???t kh???u m???i',
            're_new.required'=>'Vui l??ng nh???p x??c nh???n m???t kh???u',
            're_new.same'=>'M???t kh???u kh??ng gi???ng nhau',
            'new.min'=>'M???t kh???u ph???i ??t nh???t 6 k?? t???',
            'new.max'=>'M???t kh???u kh??ng ???????c qu?? 20 k?? t???'
        ]);
        if (Auth::attempt($credentials))
        {
            $tk->password = Hash::make($request->new);   
            $tk->save();
            session()->forget('admintk');
            session()->put('admintk', $tk);
                return redirect()->back()->with('success', '?????i m???t kh???u th??nh c??ng'); 
        }         
        else
            return redirect()->back()->withErrors(['msg'=>'M???t kh???u kh??ng ????ng']);   
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
            'email.required'=>'Vui l??ng nh???p email',
            'email.email'=>'Email kh??ng ????ng ?????nh d???ng',
            'password.required'=>'Vui l??ng nh???p m???t kh???u',
            'password.min'=>'M???t kh???u ??t nh???t 6 k?? t???',
            'password.max'=>'M???t kh???u kh??ng qu?? 20 k?? t???'
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
            return redirect()->back()->withErrors(['msg'=>'????ng nh???p th???t b???i']);
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
            'email.required'=>'Vui l??ng nh???p email',
            'email.email'=>'Kh??ng ????ng ?????nh d???ng email',
            'email.unique'=>'Email ???? c?? ng?????i s??? d???ng',
            'username.required'=>'Vui l??ng nh???p t??n',
            'address.required'=>'Vui l??ng nh???p ?????a ch???',
            'phone.required'=>'Vui l??ng nh???p username',
            'password.required'=>'Vui l??ng nh???p m???t kh???u',
            're_password.same'=>'M???t kh???u kh??ng gi???ng nhau',
            'password.min'=>'M???t kh???u ph???i ??t nh???t 6 k?? t???'
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
        return redirect()->back()->with('thanhcong','T???o t??i kho???n th??nh c??ng');
    }

    public function logout(Request $req){
        session()->flush();
        return redirect('/trangchu');
    }    
}
