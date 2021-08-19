<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use DB;
use Session;

class CartController extends Controller
{
    public function index(Request $req){
        $products = DB::table('products')->get();
        $types = DB::table('type_products')->get();
        $req->session()->put('Loai', $types);
        return view('trangchu',[
            'products'=>$products,
            'types'=>$types
        ]);
    }

    public function AddCart(Request $req, $id){
        $product = DB::table('products')->where('id',$id)->first();
        if ($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $req->session()->put('Cart', $newCart);
        }   
    }

    public function AddCart1(Request $req, $id, $quanty){
        $product = DB::table('products')->where('id',$id)->first();
        if ($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart1($product, $id, $quanty);
            $req->session()->put('Cart', $newCart);
        }   
        return redirect('/giohang');
    }

    public function DeleteItemCart(Request $req, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if (Count ( $newCart->products) > 0 ) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart', $newCart);
        }  
    }

    public function DeleteListItemCart(Request $req, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if (Count ( $newCart->products) > 0 ) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart', $newCart);
        }   
    }

    public function SaveListItemCart(Request $req, $id, $quanty){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);
        $req->Session()->put('Cart', $newCart);  
    }
}

