<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        //   $product = Product::all();
        $products = Product::latest()->paginate(10);
        return view('shop.index', compact('products'));
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $products = Product::create($request->all());
        return redirect()->route('shop.index')
            ->with('success', 'product added successflly');
    }

    public function show(Product $product, $id)
    {
        $product = Product::find($id);
        return view('shop.show', compact('product'));
    }

    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        return view('shop.edit', compact('product', 'id'));
    }
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);
        $product->name      = $request->input('name');
        $product->price     = $request->input('price');
        $product->detail    = $request->input('detail');

        $product->save();
        return redirect()->route('shop.index')
            ->with('success', 'product updated successflly');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()
            ->with('success_delete', 'product deleted successflly');
    }

    public function softDeletes($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back()
            ->with('success_delete', 'product soft deleted successflly');
    }
}
