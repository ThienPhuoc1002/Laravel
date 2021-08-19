<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use App\Models\Wards;
use App\Models\User;
use App\Models\BillDetail;
use App\Models\Bill;
use App\Models\Task;
use DB;
use Session;

class HanhchinhController extends Controller
{
    public function index(Request $req){
		$tk = User::find(session()->get('admintk')->id);
		$city = City::all();
        $province = Province::all();
        $wards = Wards::all();
        return view('khachhang',[
            'city'=>$city,
            'province'=>$province,
            'wards'=>$wards,
			'tk' => $tk
        ]); 
    }

	public function thanhtoan(){
		if (session()->has('admintk') && session()->get('Cart')){
			$tk = User::find(session()->get('admintk')->id);
			$city = City::all();
			$province = Province::all();
			$wards = Wards::all();
			$feeship = DB::table('phiship')->where('xaid', session()->get('admintk')->xaid)->where('matp', session()->get('admintk')->matp)->where('xaid', session()->get('admintk')->xaid)->get();
			foreach ($feeship as $fee)
				$fee = $fee;
			return view('thanhtoan',[
				'fee'=>$fee,
				'tk'=>$tk,
				'city'=>$city,
				'province'=>$province,
				'wards'=>$wards
			]);
		}
		else{
			return redirect('/dangnhap');
		}	
    }

    public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = DB::table('quanhuyen')->where('matp', $data['ma_id'])->get();
    				$output.='<option disabled selected>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->name.'</option>';
    			}

    		}else{
    			$select_wards = DB::table('xaphuongthitran')->where('maqh', $data['ma_id'])->get();
    			$output.='<option disabled selected>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
    			}
    		}
    		echo $output;
    	}
    	
    }

	public function dathang(Request $req){
        $cart = Session::get('Cart');
        if (!Session::has('admintk')){
			$users = new User;
			$users->full_name = $req->name;
			$users->email = $req->email;
			$users->address = $req->address;
			$users->phone = $req->phone;
			$users->quyen = 0;
			$users->save();
		}else{
			$users = session()->get('admintk');
		}
        
		foreach ($cart->products as $key => $value) {
            $products = Product::find($value['ttin']->id);
            $products->quanty = $products->quanty - $value['sluong'];
            $products->save();
        }

        $bill = new Bill;
        $bill->id_user = $users->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->note = $req->note;
        $bill->save();


        foreach ($cart->products as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quanty = $value['sluong'];
            $bill_detail->unit_price = $value['gia'];
            $bill_detail->save();
        }
        Session::forget('Cart');
        return redirect('/khachhang')->with('success', 'Đặt hàng thành công');
    }

	public function guilienhe(Request $req){
        $task = new Task;
		$task->name = $req->name;
		$task->email = $req->email;
		$task->tieude = $req->tieude;
		$task->phone = $req->phone;
		$task->noidung = $req->noidung;
		$task->checked = 0;
		$task->save();
        return redirect('/lienhe')->with('thanhcong', 'Gửi liên hệ thành công');
    }
}

