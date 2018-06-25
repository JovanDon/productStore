<?php

namespace App\Http\Controllers;
use Session;
use App\Pdt;
use Illuminate\Http\Request;

class PdtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addproduct( Request $request)
    {
       
     /*   $request->validate( [
            'name' => 'required',
            'cprice' => 'required',
            'sprice' => 'required',
            'qty' => 'required',
            'expdate' => 'required' 
        ]);
*/
         //get post data
         $postData = ['name' => $request->name,
         'amount_instock'=> 6,
         'qty' => 6,
         'cprice' => 6,
         'sprice' => 7,
         'expdate' => $request->exdate];
        
        // dd($postData );
         //insert post data
         Pdt::create($postData);
      
   //store status message
   Session::flash('success_msg', 'product added successfully!');
   $products= Pdt::all();
   return view('view',compact('products',$products));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdt  $pdt
     * @return \Illuminate\Http\Response
     */
    public function show(Pdt $pdt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pdt  $pdt
     * @return \Illuminate\Http\Response
     */
    public function editproduct(Request $request)
    {
        Pdt::where('id', $request->_id)->update(["name"=> $request->name, 
                                                "qty"=> $request->qty,
                                                "cprice"=> $request->cprice,
                                                "sprice"=> $request->sprice,
                                                "expdate"=>$request->exdate
                                                ]);
       

         //store status message
   Session::flash('success_msg', 'product edited successfully!');
   $products= Pdt::all();
        return view('view',compact('products',$products));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdt  $pdt
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
   
        $del = Pdt::where('id', $request->_id)->delete();

        $products= Pdt::all();
        return view('view',compact('products',$products));
    }
}
