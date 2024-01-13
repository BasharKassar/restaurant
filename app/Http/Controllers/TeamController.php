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
        $team->name_team=$request->name_team;
        $team->work=$request->work;
        $team->image= $this->verifyAndUpload($request, 'image', 'teamImage');
    
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
    public function edit($id)
    {
            $team=Team::find($id);
            return view('team.index',compact('team'));
        }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
            $team=Team::find($id);
            $team->name_team=$request->name_team;
            dd($team);
            if (!empty ($request->file('image'))) {
                if(\File::exists(public_path('teamImage/').$team->image)){
                    \File::delete(public_path('teamImage/').$team->image);
                }
                $imageName = uniqid() . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('teamImage'), $imageName);
                $team->image= $imageName;
            }
            $team->save();
          
            return redirect()->with('success','تم التعديل بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
        {
            $team=Team::find($id);
            if(\File::exists(public_path('teamImage/').$team->image)){
                \File::delete(public_path('teamImage/').$team->image);
            }
            $team->delete();

    
            return redirect('team.index')
                ->with('success','team delete successfully.');
        }
    
}
