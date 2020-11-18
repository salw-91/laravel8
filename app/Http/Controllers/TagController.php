<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tags = Tag::orderBy('tag')->get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        $tag = Tag::create([
            'tag' => $request->tag,
        ]);

        $tags = Tag::create($request->all());
        return redirect()->route('tags.index')
            ->with('success', 'Tag added successflly');
    }

    public function edit( $id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find( $id ) ;
        $this->validate($request,[
            'tag' =>  'required',
        ]);

    $tag->tag = $request->tag;
    $tag->save();
    $tags =  Tag::all();
        return redirect()->route('tags')
            ->with('success', 'Tag added successflly');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->destroy($id);
        return redirect()->back() ->with('success_delete', 'Tag deteled successflly') ;
    }
}
