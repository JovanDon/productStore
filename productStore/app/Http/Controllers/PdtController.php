<?php

namespace App\Http\Controllers;
use Session;
use App\Pdt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class PdtController extends Controller{
    
    public function download( Request $request)
    {
        // $url = Storage::url($request->certificate);//dd($url );        
        return Storage::download($request->certificate );
    }

        
    public function addproduct( Request $request)
    {
        
        $request->validate( [
            'name' => 'required',
            'cprice' => 'required',
            'sprice' => 'required',
            'qty' => 'required'
        ]);

        $Filepath=null;
        if($request->file('supplier_certificate')){
            $Filepath = Storage::putFile(
                'supplier_certificate',
                $request->file('supplier_certificate')
                );
        }
       
        $logged_in_user=Auth::user();

        // define aray data to insert in product table
        $postData = [
            'name' => $request->name,
            'amount_instock'=> $request->qty,
            'qty' => $request->qty,
            'cprice' => $request->cprice,
            'sprice' => $request->sprice,
            'expdate' => $request->exdate,
            'user_id' =>$logged_in_user->id,
            'supplier_certificate'  =>$Filepath 
        ];
        

    //insert post data
    Pdt::create($postData);
        
    //store status message
    Session::flash('success_msg', 'product added successfully!');
    return $this->show();
    }

    // Display user Products
    public function show()
    {

        $products= Pdt::all()->where('user_id',Auth::user()->id );
        
        if(User::isAdmin()){
        $products= Pdt::all();
        }else{
             $products= Pdt::all()->where('user_id',Auth::user()->id );//Pdt::all();
        }
        

        return view('view',compact('products',$products));

    }

    // Show the form for editing the specified resource.     
    public function editproduct(Request $request){

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

    // Remove the specified resource from storage.
    public function destroy( Request $request)
    {
        Storage::delete($request->certificate );
        
        $del = Pdt::where('id', $request->_id)->delete();
        return $this->show();
    }

}
