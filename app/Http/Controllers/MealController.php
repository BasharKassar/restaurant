<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use App\Models\Meal;

use Excel;
use App\Exports\MealsExport;
use App\Imports\MealssImport;
use App\Imports\MealsImport;



class MealController extends Controller
{

public function index(){

    $meals = Meal::paginate(3);
    return view('meal.index',compact('meals'));
}





public function create(){

    $cats = Category::latest()->get();
    return view('meal.create_meal' ,compact('cats'));

}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3|max:40',
        'description' => 'required|min:3|max:500',
        'price' => 'required|numeric',
        'image' => 'required|mimes:png,jpeg,jpg',

    ]);

    $image = $request->file('image'); //$image = clinic.jpg
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //$name_gen =4654654646 .jpg
        Image::make($image)->resize(300, 300)->save('upload/Meals/'. $name_gen);

        $save_url = 'upload/Meals/' . $name_gen;


        Meal::insert([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $save_url,
        ]);


        $notification = array(
			'message_id' => 'تم الاضافة بنجاح',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);



}




public function edit($id){

    $meal = Meal::find($id);

    $cats = Category::latest()->get();

    return view('meal.edit_meal' ,compact('meal','cats'));

}

public function update(Request $request, $id)
{
    $old_img = $request->old_image;

    if ($request->file('image')) {

        unlink($old_img);
        $image = $request->file('image'); //$image = clinic.jpg

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //$name_gen =4654654646 .jpg

        Image::make($image)->resize(300, 300)->save('upload/Meals/' . $name_gen);

        $save_url = 'upload/Meals/' . $name_gen;

        Meal::findOrFail($id)->update([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $save_url,

        ]);
        return redirect()->route('meal.index')->with('message', 'تم تعديل الوجبة بنجاح!');
    } //end id

    else {
        Meal::findOrFail($id)->update([
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('meal.index')->with('message', 'تم تعديل الوجبة بنجاح!');
    } // end else



}



public function show_details($id){

    $meal= Meal::findOrFail($id);

    return view ('meal.meal_details',compact('meal'));

}






public function delete($id)
{
    Meal::find($id)->delete();

    return redirect()->back()->with('message', 'تم حذف الوجبة بنجاح!');
}
public function importview()
{
    return view('meal.import');
}
//...
public function import(Request $request)
{
    $file = $request->file('file');
    Excel::import(new MealsImport, $file);
    return back()->with('success', 'Meals imported successfully.');
}
public function export()
{
    return Excel::download(new MealsExport, 'meals.xlsx');
}


}
