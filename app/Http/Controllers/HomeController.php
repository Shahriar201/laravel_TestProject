<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('home');
    }
    public function about()
    {
    	return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
	//data validation crude ..............
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'requires',
            'phone' => 'required',
            'message' => 'required',
        ]);


        $data = array();
        $data['name']=$request->name; 
        $data['email']=$request->email; 
        $data['phone']=$request->phone; 
        $data['message']=$request->message; 

        $store=DB::table('stores')->insert($data);

        if ($store) {
            $notification = array(
                'message' => 'Successfully Data Submitted', 
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Something went wrong', 
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
        }
        
    }
}
