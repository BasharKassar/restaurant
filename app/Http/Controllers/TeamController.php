<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    

public function show(){

    $teams=Team::paginate(4);
   
    return view('team.TeamPage' , compact('teams'));
}

public function store(Request $request)
{
    //$request->validate(['team_name' => 'required|string|unique:categories|min:3|max:40',]);

    Team::insert([
        'team_name' => $request->team_name ,
        'image'  =>'required|mimes:png,jpeg,jpg',

     ]);
     
    $image = $request->file('image'); //$image = clinic.jpg
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //$name_gen =4654654646 .jpg
    Image::make($image)->resize(100, 100)->save('upload/Teams/'. $name_gen);

    $save_url = 'upload/Teams/' . $name_gen;

          
    return back()->with('message', 'تم إضافة شخص جديد!');






}



public function delete($id)
{
    Team::find($id)->delete();
    return redirect()->route('team.show')->with('message', 'تم حذف شخص بنجاح!');
}


public function update(Request $request)
{
    $request->validate([
        'team_name' => 'required|string|unique:categories|min:3|max:40',
        'image' => 'required|mimes:png,jpeg,jpg',

    ]);
    $image = $request->file('image'); //$image = clinic.jpg
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //$name_gen =4654654646 .jpg
    Image::make($image)->resize(300, 300)->save('upload/Teams/'. $name_gen);

    $save_url = 'upload/Teams/' . $name_gen;

    Team::insert([
        'team_name' => $request->name,
        'image' => $save_url,
    ]);

    $id=$request->id;
    Team::findOrFail($id)->update([
        'team_name' => $request->team_name,
        'image' => $request->image,

    ]);
    return redirect()->route('team.show')->with('message', 'تم تعديل معلومات بنجاح!');
// end else
}






}