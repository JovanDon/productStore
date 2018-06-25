<?php
namespace App\Http\Controllers;
use App\Pdt;
use Illuminate\Http\Request;
use Session;
class PostController extends Controller
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
        return view('view');
    }
   
    public function editproduct( Request $request)
    {
       

        return view('edit');
    }
    
}
