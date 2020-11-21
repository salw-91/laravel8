<?php

namespace App\Http\Controllers;

use App\Models\Sort;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function index()
    {
        $sorts = Sort::all();
        return view('sort.index', compact('sorts'));
    }

    public function create()
    {
        return view('sort.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                'sort' => 'required',
            ]);

            $sort = Sort::create([
                'sort' => $request->sort,
            ]);

            return redirect()->route('sorts')
            ->with('success', ' Sort added successflly');
    }

    public function edit($id)
    {
        $sort = Sort::find($id);
        return view('sort.edit', compact('sort'));
    }

    public function update(Request $request, $id)
    {
        $sort = Sort::find( $id ) ;
        $this->validate($request,[
            'sort' =>  'required',
        ]);

    $sort->sort = $request->sort;
    $sort->save();
    $sorts =  Sort::all();
        return redirect()->route('sorts')
            ->with('success', 'Sort added successflly');
    }

    public function destroy($id)
    {
        $sort = Sort::find($id);
        $sort->destroy($id);
        return redirect()->back()->with('success_delete', 'sort deteled successflly');
    }
}
