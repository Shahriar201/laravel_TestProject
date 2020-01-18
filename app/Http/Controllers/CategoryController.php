<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

       $data=array();
       $data['title']=$request->title;
       $data['category_id']=$request->category_id;
       $data['details']=$request->details;
       $image=$request->file('image');
       if ($image) {
           $image_name=hexdec(uniqid());
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/frontend/image/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
           $data['image']=$image_url;
           DB::table('posts')->insert($data);
            $notification=array(
               'messege'=>'Successfully Post Inserted',
               'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
       }else{
            DB::table('posts')->insert($data);
            $notification=array(
               'messege'=>'Successfully Post Inserted',
               'alert-type'=>'success'
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function allpost()
    {
        // $post = DB::table('posts')->get();
        $post = DB::table('posts')
              ->join('categories','posts.category_id', 'categories.id')
              ->select('posts.*', 'categories.name')
              ->get();
        return view('allpost', compact('post'));
    }
}
