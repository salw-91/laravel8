<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $productsDeleted = Product::onlyTrashed();
        return view('shop.index', compact('products', 'productsDeleted'));
    }

    public function trashedProducts()
    {
        $products = Product::onlyTrashed()->latest()->paginate(4);
        return view('shop.trash', compact('products'));
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
        $product = Product::find($id)->delete();
        // $product->delete();
        return redirect()->back()
            ->with('success_delete', 'product deleted successflly');
    }

    public function softDeletes($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back()
            ->with('success_delete', 'product soft deleted successflly');
    }

    public function hardDeletes($id)
    {
        $product =  Product::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()
            ->with('success_delete', 'product hard deleted successflly');
    }

    public function ReturnFromSoftDeletes($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->back()
            ->with('success', 'product return successflly');
    }
}
