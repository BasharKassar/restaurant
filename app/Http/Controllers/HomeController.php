<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Team;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cats=Category::all();

        if (Auth()->user()->is_admin == 1) {

$order=Order::orderBy('id','DESC')->get();
  $orders=Order::with('user')->addSelect(DB::raw('SUM(qty) as purchase_total, user_id'))
    ->groupBy('user_id')
    ->orderBy('purchase_total', 'DESC')->first();
    $porders=Order::with('user')->addSelect(DB::raw('SUM(qty) as product_count, meal_id'))
    ->groupBy('meal_id')
    ->orderBy('product_count', 'DESC')->first();

            return view('AdminPage', compact('order','orders','porders'));
        } else{
        
            $cats=Category::all();

            if (Auth()->user()->is_admin == 2) {
    
    $order=Order::orderBy('id','DESC')->get();
                return view('EmpPage', compact('order'));
            }else{
            if (!$request->category) {
                $cat1="الصفحة الرئيسية";
                $meals=Meal::all();

                return view('UserPage', compact('cats', 'meals','cat1'));
            } else {
                $cat1=$request->category;
               $meals=Meal::where('category', $request->category)->get();
                return view('UserPage', compact('cats', 'meals','cat1'));
            }
        }
        }}




public function orderStore(Request $request){

    Order::insert([

        'user_id'=>Auth()->user()->id,
        'phone'=>$request->phone,
        'date'=>$request->date,
        'time'=>$request->time,
        'meal_id'=>$request->meal_id,
        'qty'=>$request->qty,
        'address'=>$request->address,

         'status'=>"تتم مراجعة الطلب"

    ]);


    $notification = array(
        'message_id' => 'تم الطلب  بنجاح',
        'alert-type' => 'success'
    );

    return redirect()->route('home')->with($notification);






}




public function show_order(){

    $order=Order::where('user_id',Auth::user()->id)->get();
  
    
    return view('order.show_order',compact('order'));



}
public function search(Request $request){
$search=$request->search;
    $meal=$Meal::where('name','Like','%'.$search.'%')->get();

    return view('show_details',compact('meal'));



}



public function changeStatus(Request $request,$id){

    $order = Order::find($id);
     Order::where('id',$id)->update(['status'=> $request->status]);
     return back();



}








}
