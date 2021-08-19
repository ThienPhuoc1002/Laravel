<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BillController extends Controller
{
    public function index(){
        $bills = DB::table('bills')->get();
        return view('admin.hoadon',[
            'bills'=>$bills
        ]);
    }
}
