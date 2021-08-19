<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use DB;
use Session;

class ProductController extends Controller
{
    public function index(Request $req){
        $products = DB::table('products')->get();
        $types = DB::table('type_products')->get();
        return view('sanpham',[
            'products'=>$products,
            'types'=>$types
        ]);
    }

    public function timsanpham(Request $req){
        $products = DB::select('select * from products where name like ?', ['%'.$req->name.'%']);
        return view('sanpham',[
            'products'=>$products
        ]);
    }

    public function timtheogia(Request $req){
        if ($req->name=="Dưới 10.000đ")
            $products = DB::select('select * from products where promotion_price < 10000');
        if ($req->name=="Từ 20.000đ đến 30.000đ")
            $products = DB::select('select * from products where promotion_price < 30000 and promotion_price > 20000');
        if ($req->name=="Từ 10.000đ đến 20.000đ")
            $products = DB::select('select * from products where promotion_price < 20000 and promotion_price > 10000');
        return view('sanpham',[
            'products'=>$products
        ]);
    }

    public function hoadon(Request $req){
        $bills = DB::table('bills')->get();
        $users = DB::table('users')->get();
        return view('admin.hoadon',[
            'bills'=>$bills,
            'users' =>$users
        ]);
    }

    public function xemhoadon(Request $req, $id){
        $bill = Bill::find($id);
        $bill_details = BillDetail::where('id_bill',$id)->get();
        return view('admin.xemhoadon',[
            'bill'=>$bill,
            'bill_details' =>$bill_details
        ]);
    }

    public function tintuc(Request $req){
        $news = DB::table('news')->get();
        return view('tintuc',[
            'news'=>$news
        ]);
    }
}

