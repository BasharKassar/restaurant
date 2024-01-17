<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Team;
class VisitorController extends Controller
{
    
public function index(Request $request){

    $cats=Category::all();

    $teams=Team::all();   

        if (!$request->category) {
          
            $cat1="الصفحة الرئيسية";
            $meals=Meal::all();  
 
            return view('visitorPage', compact('cats', 'meals','cat1','teams'));
        } else {
            $cat1=$request->category;
            $meals=Meal::where('category', $request->category)->get();         
            return view('visitorPage', compact('cats', 'meals','cat1','teams'));
        
    }

 
}




}
