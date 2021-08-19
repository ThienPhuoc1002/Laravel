<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\User;
use App\Models\BillDetail;
use App\Models\ThongKe;
use App\Charts\SampleChart;
use App\Models\Task;
use DB;
use Session;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function admin(Request $req){
        $tk = ThongKe::orderBy('ngay')->pluck('ngay');
        $tk1 = ThongKe::orderBy('ngay')->pluck('tongtien');
        $chart = new SampleChart;
        $chart->labels($tk->values());
        $chart->dataset('Doanh thu', 'bar', $tk1->values())
        ->backgroundColor('green');

        $tk2 = ThongKe::orderBy('ngay')->pluck('ngay');
        $tk3 = ThongKe::orderBy('ngay')->pluck('luongsanpham');

        $chart2 = new SampleChart;
        $chart2->labels($tk2->values());
        $chart2->dataset('Sản phẩm đã bán', 'line', $tk3->values())
        ->backgroundColor('blue');

        $tien = $khach = $lienhe = $quanly = 0;

        $users = User::all();
        foreach ($users as $user)
            if($user->quyen == 1)
                $quanly +=1;
            else    
                $khach +=1;

        $tasks = Task::all();
        foreach ($tasks as $task)
            if($task->checked == 0)
                $lienhe +=1;

        $tks = ThongKe::all();
        foreach ($tks as $tk)
            $tien += $tk->tongtien;

        if (session()->has('admintk'))
            if (session()->get('admintk')->quyen == 0)
                return redirect('/khachhang');
            else
                return view('/admin.index', compact('chart','chart2','tien','khach','lienhe','quanly'));
        else
            return view('dangnhap');
    }
    
    public function thongke(Request $request){

        // $date = "02/22/2020";
        // $newDate = \Carbon\Carbon::createFromFormat('m/d/Y', $date)
        //                 ->format('Y-m-d');
        // dd($newDate);

        // $date = \Carbon\Carbon::createFromFormat('m/d/Y', $request->choose)
        //             ->format('Y-m-d');
        $date = $request->choose;
        $tong = 0;
        $bills = Bill::all(); 
        foreach ($bills as $bill)
            if ($bill->date_order == $date)
                $tong = $tong + $bill->total;
        return redirect()->back()->with('success', $tong); 
    }

    public function kettoan(Request $request){

        // $date = "02/22/2020";
        // $newDate = \Carbon\Carbon::createFromFormat('m/d/Y', $date)
        //                 ->format('Y-m-d');
        // dd($newDate);
        $bills = Bill::all();
        // $date = \Carbon\Carbon::createFromFormat('m/d/Y', $request->choose1)
        //             ->format('Y-m-d');
        $date = $request->choose1;
        $tk = DB::table('thongke')->where('ngay', $date)->first();

        $dts = DB::table('bill_details')->get();
        $tong = 0;$tong1 = 0;
        foreach ($bills as $bill)
            if ($bill->date_order == $date)
                foreach ($dts as $dt)
                    if ($dt->id_bill == $bill->id)
                        $tong1 = $tong1 + $dt->quanty;
        foreach ($bills as $bill)
            if ($bill->date_order == $date)
                $tong = $tong + $bill->total;
        if (!$tk){
            $tk = new ThongKe();
            $tk->ngay = $date;
            $tk->tongtien = $tong;
            $tk->luongsanpham = $tong1;
            $tk->save();
            return redirect()->back()->with('success1', $tong); 
        }
        else{
            $tk = ThongKe::find($tk->id); 
            $tk->ngay = $date;
            $tk->tongtien = $tong;
            $tk->luongsanpham = $tong1;
            $tk->save();
            return redirect()->back()->with('success1', $tong); 
        }     
    }

    public function adminlienhe(Request $request){
        $tk0s = DB::select('select * from lienhe where checked = 0');
        $tk1s = DB::select('select * from lienhe where checked = 1');
        return view('admin.lienhe',[
            'tk0s'=> $tk0s,
            'tk1s'=>$tk1s
        ]);
    }

    public function adminxemlienhe(Request $request, $id){
        $tk0 = Task::find($id);
        $tk0->checked = 1;
        $tk0->save();
        return view('admin.xemlienhe',[
            'tk0'=> $tk0
        ]);
    }

}
