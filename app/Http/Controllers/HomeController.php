<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryT;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function index(){
        $Category = Category::all();
        $CategoryT = CategoryT::all();
        return view('home',compact('Category','CategoryT'));
    }
    public function mytkt(){
        $stocks = Ticket::where('creator','=',Auth::user()->name)->orderBy('id','DESC')->paginate(20);
        return view('mytkt',compact('stocks'));
    }
    public function AddTikit(Request $request ){
        $validator = \Validator::make($request->all(),[
            'Cate' => 'required',
            'Cate2'=> 'required',
            'des'=> 'required'
            ]);
            if($validator->fails()){
                return redirect('home')->withErrors($validator);
            }else{
                $create_user =  Ticket::create([
                    'creator' => Auth::user()->name,
                    'type' => $request->Cate,
                    'typet' => $request->Cate2,
                    'description' => $request->des,
                    'tikit_state' => "Pending",
                    'supervisor_approval' => "No",
                ]);
                return $create_user ? redirect('home')->with('result','Ticket Added Successfully'):redirect('home')->with('result','Internal Error Occured');
            }
    }
}
