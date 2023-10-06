<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product= Product::all();
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=> 'required',
            'product_description'=>'required|string',
            'product_price' => 'required|integer'
        ]);
        $product=new Product([
            'product_name'=> $request->get('product_name'),
            'product_description'=> $request->get('product_description'),
            'product_price'=> $request->get('product_price')
        ]);
        $product->save();
        return redirect('/supershop')->with('success','Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id==1) {
            return redirect('/supershop/create');
        }
        else{
            return redirect('/supershop');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product =Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name'=> 'required',
            'product_description'=>'required|string',
            'product_price' => 'required|integer'
        ]);
        $product = Product::find($id);
        $product->product_name=$request->get('product_name');
        $product->product_description=$request->get('product_description');
        $product->product_price=$request->get('product_price');
        $product->save();
        return redirect('/supershop')->with('success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/supershop')->with('success','Product has been deleted successfully');
    }
}
