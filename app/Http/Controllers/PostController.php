<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::orderBy('created_at', 'DESC')->get();
        $postsDeleted = Post::onlyTrashed()->where('user_id', Auth::id());
        $posts = Post::latest()->paginate(10);
        return view('post.index', compact('posts', 'postsDeleted'));
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->where('user_id', Auth::id())->latest()->paginate(10);
        return view('post.trash', compact('posts'))
        ->with('success', 'Post added successflly');
    }

    public function create()
    {
        $tags = Tag::all();
        if ($tags->count() == 0 ) {
            return redirect()->route('post.create');
        }
        return view('post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'tag' => 'required',
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
        $posts->tag()->attach($request->tag);
        return redirect()->route('posts.index')
        ->with('success', 'Post Added Successflly');

    }

    public function show($slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug' , $slug )->first();
        return view('post.show', compact('post', 'tags'));
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        if ($post === null) {
            return redirect()->back();
        };
        return view('post.edit', compact('post','tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find( $id ) ;
        $this->validate($request,[
            'title' =>  'required',
            'body' =>  'required'
        ]);

     //   dd($request->all());

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
        $post->photo ='uploads/posts/'.$newPhoto;
    }

    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    $post->tag()->sync($request->tag);

    return redirect()->back()
    ->with('success', 'Post Updated successflly');
    }

    public function destroy($id)
    {
        $post = Post::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($post === null) {
           return redirect()->back() ;
       }

        $post->delete($id);
        return redirect()->back() ;
    }


    public function softDeletes($id)
    {
        $post = Post::where('id' , $id )->where('user_id', Auth::id())->first();
        $post->delete();
        return redirect()->back()->with('success_delete', 'Post soft deleted successflly.');;
    }
    public function harddelete($id)
    {
        $post = Post::withTrashed()->where('id' ,  $id )->where('user_id', Auth::id())->first();
        $post->forceDelete();
        return redirect()->back() ;

    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' ,  $id )->where('user_id', Auth::id())->first();
        $post->restore();
        return redirect()->back() ;
    }
}
