<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profile;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->where('user_id', Auth::id());
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile == null) {
            $profile = Profile::create([
                'telefoon' => '0685554440',
                'bio' => 'Hello world',
                'link' => 'https://www.wikipedia.org/',
                'user_id' => $id,
            ]);
        }
        return view('profile.profile', compact('posts', 'user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'telefoon'    => 'required',
            'bio'	   => 'required',
            'link'	   => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->profile->telefoon = $request->telefoon ;
        $user->profile->bio = $request->bio ;
        $user->profile->link = $request->link ;
        $user->save();
        $user->profile->save();

     return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
