<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Skill;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        if ($skills->count() == 0) {
            redirect()->route('skill.create');
        }
        return view('user.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);

       $user =  User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password ),
        ]);

        $profile = Profile::create([
                'telefoon' => '0685554440',
                'bio' => 'Hello world',
                'link' => 'https://www.wikipedia.org/',
                'user_id' => $user->id,
            ]);
        $user->skill()->attach($request->skills);
            return redirect()->route('users');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        $posts = Post::all()->where('user_id', $user->id);
        return view('user.edit', compact('user','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'telefoon'    => 'required',
            'bio'	   => 'required',
            'link'	   => 'required',
        ]);

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
        $user = User::find($id);
        $user->profile->delete($id);
        $user->delete();
        return redirect()->route('users');

    }
}
