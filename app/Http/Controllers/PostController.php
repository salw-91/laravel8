<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('post/index', compact('posts'));
    }

    public function trashed()
    {
        return ('trashed');
    }

    public function create()
    {
        return ('create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function harddelete($id)
    {
        return ('harddelete');
    }
    public function restore($id)
    {
        return ('restore');
    }
}
