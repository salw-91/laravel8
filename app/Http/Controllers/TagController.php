<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required',

        ]);
        $tag = Tag::create([
            'tag' => $request->tag,

        ]);
        return redirect()->back()
        ->with('success', 'Tag Added Successflly');
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
    return redirect()->back()
    ->with('success', 'Tag Updated successflly');
    }

    public function destroy(Tag $tag)
    {
        $tag = Tag::find($id);

        $tag->destroy($id);
        return redirect()->back() ;
    }
}
