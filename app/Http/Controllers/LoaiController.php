<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Product;
use Session;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeProduct::all();
        $products = Product::all();
        if (session()->get('admintk')->quyen==1)
            return view('admin.hienthi',[
                'types'=>$types,
                'products'=>$products
            ]);
        else
            return redirect('/trangchu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->get('admintk')->quyen==1)
            return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types = new TypeProduct;
        $types->name = $request->input('1');
        $types->description = $request->input('2');
        $types->image = $request->input('3');
        $types->save();

        return redirect('/loai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types = TypeProduct::find($id);
        return view('Pages.loai')->with('types', $types);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = TypeProduct::find($id);
        if (session()->get('admintk')->quyen==1)
            return view('admin.edit')->with('types', $types);
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
        $types = TypeProduct::where('id', $id)
            ->update([
                'name'=> $request->input('1'),
                'image'=> $request->input('3'),
                'description'=> $request->input('2')
        ]);
        if (session()->get('admintk')->quyen==1)
            return redirect('/loai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = TypeProduct::find($id);
        $types->delete();
        return redirect('/loai');
    }
}
