<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('created_at','desc')->get();
        return view('skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create');
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
                'skill' => 'required',
            ]);

            $skill = Skill::create([
                'skill' => $request->skill,
            ]);


            return redirect()->back()
            ->with('success', ' Skill added successflly');
    }


    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::find( $id ) ;
        $this->validate($request,[
            'skill' =>  'required',
        ]);

    $skill->skill = $request->skill;
    $skill->save();
    $skills =  Skill::all();
        return redirect()->route('skills')
            ->with('success', 'Tag added successflly');
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->destroy($id);
        return redirect()->back()->with('success_delete', 'skill deteled successflly');
        }
}
