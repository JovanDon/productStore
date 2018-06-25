<?php

namespace App\Http\Controllers;
use Session;
use App\Pdt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        
        // dd(  Auth::user()->id );
         $postData = ['name' => $request->name,
         'amount_instock'=> $request->amount_instock,
         'qty' => $request->qty,
         'cprice' => $request->cprice,
         'sprice' => $request->sprice,
         'expdate' => $request->exdate,
         'user_id' => Auth::user()->id  
        ];
     
        // dd($postData );
         //insert post data
         Pdt::create($postData);
      
   //store status message
   Session::flash('success_msg', 'product added successfully!');
  return $this->show();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdt  $pdt
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $products= Pdt::all()->where('user_id',Auth::user()->id );//Pdt::all();
        
       if(Auth::user()->name =="Admin")
       $products= Pdt::all();
       else
       $products= Pdt::all()->where('user_id',Auth::user()->id );//Pdt::all();
        

        return view('view',compact('products',$products));

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
   return $this->show();
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
        return $this->show();
    }
}
