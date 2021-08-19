<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Wards;
use App\Models\City;
use App\Models\Province;
use App\Models\Ship;
use App\Models\User;
use Session;

class DeliveryController extends Controller
{
    public function delivery(){
        $city = City::all();
        $province = Province::all();
        $feeship = Ship::all();
        return view('admin.themphi',[
            'city'=>$city,
            'province'=>$province,
            'feeship'=>$feeship
        ]);
    }

	public function giohang(){
        return view('giohang',[
        ]);
    }

    public function insert_delivery(Request $request){
		$data = $request->all();
		$fee_ship = new Ship();
		$fee_ship->matp = $data['city'];
		$fee_ship->maqh = $data['province'];
		$fee_ship->xaid = $data['wards'];
		$fee_ship->phi = $data['fee_ship'];
		$fee_ship->save();
		return redirect()->back()->with('success', 'Thêm thành công'); 
	}

	public function editphi(Request $request, $id){
		$fee_ship = Ship::find($id);
		return view('admin.editphi',[
            'fee_ship'=>$fee_ship
        ]);
	}

	public function suaphi(Request $request, $id){
		$fee_ship = Ship::find($id);
		$fee_ship->phi = $request->phi;
		$fee_ship->save();
		return redirect('/delivery')->with('success', 'Sửa thành công'); 
	}

	public function xoaphi(Request $request, $id){
		$fee_ship = Ship::find($id);
		$fee_ship->delete();
		return redirect('/delivery')->with('success', 'Xóa thành công');
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
}
