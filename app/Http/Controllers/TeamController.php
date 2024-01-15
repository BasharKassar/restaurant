<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageTrait;

class TeamController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        return view('team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name_team' => ['required','unique:teams'],
            'work' => ['required','unique:teams'],
            'image' => ['required'],
        ])->validate();
      
        $team = new Team();
        $team->name_ar=$request->name_team;
        $team->name_en=$request->work;
        $team->image= $this->verifyAndUpload($request, 'image', 'Teamimage');
    
        $team->save();
        return redirect()->back()->with('success','تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->update(['name_team'=>$request->name_team,'work'=>$request->work]);

        if (!empty ($request->file('image'))) {
            if(\File::exists(public_path('Teamimage/').$brand->image)){
                \File::delete(public_path('Teamimage/').$brand->image);
            }
            $imageName=$this->verifyAndUpload($request, 'image', 'Teamimage');
            $team->update(['image'=> $imageName]);
        }
        return redirect()->back()->with('success','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
