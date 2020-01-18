<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('categories')->get();
        return view('write_post', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);


        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);

        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Inserted', 
                'alert-type' => 'success'
            );
            
            return Redirect()->route('all.category')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Something went wrong', 
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = DB::table('categories')->get();
        //return response()->json($category);
        return view('allcategory', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        return view('editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = array();
        $data['name']= $request->name;
        $data['slug']= $request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);

        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Updated', 
                'alert-type' => 'success'
            );
            
            return Redirect()->route('all.category')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Nothing to update', 
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
