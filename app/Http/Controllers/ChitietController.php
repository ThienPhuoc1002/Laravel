<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TypeProduct;

class ChitietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $types = TypeProduct::all();
        if (session()->get('admintk')->quyen==1)
            return view('admin.hienthichitiet',[
                'products'=>$products,
                'types'=>$types
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeProduct::all();
        if (session()->get('admintk')->quyen==1)
            return view('admin.themsp',[
                'types'=>$types
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product;
        $products->name = $request->input('1');
        $products->type_product_id = $request->input('2');
        $products->description = $request->input('3');
        $products->unit_price = $request->input('4');
        $products->promotion_price = $request->input('5');
        $products->image = $request->input('6');
        $products->unit = $request->input('7');
        $products->new = $request->input('8');
        $products->quanty =  $request->input('9');
        $products->save();

        return redirect('/chitiet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('pages.chitiet')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = TypeProduct::all();
        $products = Product::find($id);
        if (session()->get('admintk')->quyen==1)
            return view('admin.editsp')->with(['products'=> $products,'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::where('id', $id)
            ->update([
                'name'=> $request->input('1'),
                'type_product_id'=> $request->input('2'),
                'description'=> $request->input('3'),
                'unit_price'=> $request->input('4'),
                'promotion_price'=> $request->input('5'),
                'image'=> $request->input('6'),
                'unit'=> $request->input('7'),
                'new'=> $request->input('8'),
                'quanty'=> $request->input('9')
        ]);

        return redirect('/chitiet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/chitiet');
    }
}
