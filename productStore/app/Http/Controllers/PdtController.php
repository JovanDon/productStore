<?php

namespace App\Http\Controllers;
use Session;
use App\Pdt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

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

    /*
     Function to download file
     */
    public function download( Request $request)
    {
       // $url = Storage::url($request->certificate);//dd($url );
        
       return Storage::download($request->certificate );
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
$path=null;
if($request->file('supplier_certificate'))
$path = Storage::putFile('supplier_certificate',$request->file('supplier_certificate'));
   
        // define aray data to insert in product table
         $postData = ['name' => $request->name,
         'amount_instock'=> $request->qty,
         'qty' => $request->qty,
         'cprice' => $request->cprice,
         'sprice' => $request->sprice,
         'expdate' => $request->exdate,
         'user_id' => Auth::user()->id,
         'supplier_certificate'  =>$path 
        ];
     
    
        
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

        $path=null;
        if($request->file('supplier_certificate')){
            Storage::delete($request->certificateold );
            $path = Storage::putFile('supplier_certificate',$request->file('supplier_certificate'));
        }
        
        Pdt::where('id', $request->_id)->update(["name"=> $request->name, 
                                                "qty"=> $request->qty,
                                                "cprice"=> $request->cprice,
                                                "sprice"=> $request->sprice,
                                                "expdate"=>$request->exdate,
                                                'user_id' => Auth::user()->id,
                                                'supplier_certificate'  =>$path 
                                                
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
       Storage::delete($request->certificate );
      // dd($request->certificate );
        $del = Pdt::where('id', $request->_id)->delete();
        return $this->show();
    }
}
