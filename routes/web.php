<?php

use Illuminate\Support\Facades\Route;
use App\Http\ConTrollers\ChitietController;
use App\Http\ConTrollers\LoaiController;
use App\Http\ConTrollers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HanhchinhController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DeliveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/trangchu',[CartController::class,'index']);
Route::get('/',[CartController::class,'index']);
Route::get('/gioithieu', function () {
    return view('gioithieu');
});
Route::get('/lienhe', function () {
    return view('lienhe');
});

Route::get('/giohang', [DeliveryController::class,'giohang']);

Route::get('/thanhtoan',[HanhchinhController::class,'thanhtoan']);
Route::get('/guilienhe',[HanhchinhController::class,'guilienhe']);
Route::get('/sanpham',[ProductController::class,'index']);
Route::get('/timsanpham',[ProductController::class,'timsanpham']);
Route::get('/timtheogia',[ProductController::class,'timtheogia']);
Route::get('/khachhang',[HanhchinhController::class,'index']);
Route::get('/dathang',[HanhchinhController::class,'dathang']);

Route::get('/addcart/{id}',[CartController::class,'AddCart']);
Route::get('/delcart/{id}',[CartController::class,'DeleteItemCart']);

Route::get('/dellist/{id}',[CartController::class,'DeleteListItemCart']);
Route::get('/savelist/{id}/{quanty}',[CartController::class,'SaveListItemCart']);

Route::get('/addcart1/{id}/{quanty}',[CartController::class,'AddCart1']);

Route::resource('/loai', LoaiController::class);
Route::resource('/chitiet', ChitietController::class);
Route::get('/hoadon',[ProductController::class,'hoadon']);
Route::get('/xemhoadon/{id}',[ProductController::class,'xemhoadon']);
Route::get('/tintuc',[ProductController::class,'tintuc']);

Route::get('/dangnhap',[AuthController::class,'dangnhap']);
Route::get('/dangky',[AuthController::class,'dangky']);

Route::get('/delivery',[DeliveryController::class,'delivery']);
Route::post('/select-delivery',[DeliveryController::class,'select_delivery']);
Route::post('/insert-delivery',[DeliveryController::class,'insert_delivery']);
Route::get('/editphi/{id}',[DeliveryController::class,'editphi']);
Route::post('/suaphi/{id}',[DeliveryController::class,'suaphi']);
Route::get('/xoaphi/{id}',[DeliveryController::class,'xoaphi']);

Route::get('/admin', [ChartController::class,'admin']);
Route::get('/adminlienhe', [ChartController::class,'adminlienhe']);
Route::get('/adminlienhe/{id}', [ChartController::class,'adminxemlienhe']);
Route::get('/thongke', [ChartController::class,'thongke']);
Route::get('/kettoan', [ChartController::class,'kettoan']);

Route::get('/addimg',[AuthController::class,'addimg']);
Route::get('/addtt',[AuthController::class,'addtt']);
Route::get('/editcus',[AuthController::class,'editcus']);
Route::get('/savepass',[AuthController::class,'savepass']);

Route::get('/admintintuc',[AuthController::class,'admintintuc']);
Route::get('/themtintuc',[AuthController::class,'themtintuc']);
Route::get('/addtintuc',[AuthController::class,'addtintuc']);
Route::get('/edittintuc/{id}',[AuthController::class,'edittintuc']);
Route::get('/suatintuc/{id}',[AuthController::class,'suatintuc']);

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/chart',[ChartController::class,'index']);

Route::get('/adminprofile',[AuthController::class,'adminprofile']);
Route::get('/adminpass', function () {
    return view('admin.pass');
});
