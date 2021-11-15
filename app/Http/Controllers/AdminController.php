<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(request $request)
    {
        $filePath = null;
       $data = new product; 
       if($request->hasFile('product_file')) {
        $image      = $request->file('product_file');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();
        $filePath = $request->file('product_file')->store('uploads');
       }
       $data->image = $filePath;
       $data->title = $request->title;
       $data->price = $request->price;
       $data->description = $request->des;
       $data->quantity = $request->quantity;
       $data->save();

       return redirect()->back();
    }
  
}
