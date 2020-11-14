<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('post/index', compact('posts'));
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate(10)->get();
        return view('post/trash', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $posts = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'photo' =>  'uploads/posts/'.$newPhoto,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title),
        ]);
        return redirect()->back() ;
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('post/show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post/show', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required|image'
        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOrginalName();
            $photo->move('uploads/posts'.$newPhoto);
            $post->photo = 'uploads/posts'.$newPhoto ;
        }
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save;
            return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();

    }
    public function harddelete($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back();

    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->restore();
        return redirect()->back();
    }
}
