<?php

namespace App\Http\Controllers;
use App\Pdt;
use Illuminate\Http\Request;
use Session;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function add()
    {
        return view('add');
    }

    public function edit(Request $request)
    {
        $product= Pdt::find($request->id);
        return view('editform',compact('product',$product));
    }
    public function view()
    {
       $products= Pdt::all();
        return view('view',compact('products',$products));
    }

  
    
}
