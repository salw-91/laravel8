<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
     //   $product = Product::all();
     $products = Product::latest()->paginate(4);
       return view('shop.index', compact('products'));
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        $products = Product::create($request->all());
         return redirect()->route('shop.index')
         ->with('success','product added successflly');
    }

    public function show(Product $product,$id)
    {
        return view('shop.show', compact('product'));
    }

    public function edit(Product $product,$id)
    {
        return view('shop.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);

        $product->update($request->all());
         return redirect()->route('shop.index')
         ->with('success','product updated successflly') ;
    }

    public function destroy(Product $product,$id)
    {
        $product->delete($id);
        return redirect()->route('shop.index')
        ->with('success','product deleted successflly');
    }
}
