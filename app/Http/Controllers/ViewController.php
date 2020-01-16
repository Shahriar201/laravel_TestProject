<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        //return response()->json('$category');
        return view('viewcategory', compact('category'));
    }
    public function delete($id)
    {
        $category=DB::table('categories')->where('id', $id)->delete();
        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Deleted', 
                'alert-type' => 'success'
            );
            
            return Redirect()->back()->with($notification);
        }
    }
}
