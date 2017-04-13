<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class PublicController extends Controller
{
    //

    public function getitem(){
    	
     $products= Product::all();
     return view('public.home')->with('products' , $products);
    }


}
