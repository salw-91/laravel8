<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $product = Shop::latest()->paginate(10);
        return view('shop.index', compact('product'));
    }

    public function create(){
        return view('shop.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'age'=>'required'
        ]);

        $request = Shop::create($request->all());
        return redirect()->route('shop.index')->with
        ('success', 'product added successflly');
    }

    public function show(Request $request){
        return view('shop.show', compact('prequest'));
    }



    public function edit(Request $request){
        return view('shop.edit', compact('prequest'));

    }
    public function update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'age'=>'required'
        ]);

        $request = Shop::update($request->all());
        return redirect()->route('shop.index')->with
        ('success', 'product updated successflly');
    }

    public function delete(Request $request){
        $request->delete();
        return redirect()->route('shop.index')->with
        ('success', 'product deleted successflly');
    }
}
