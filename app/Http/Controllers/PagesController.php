<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
use App\Maincat;
use App\Subcat;
use App\Product;
class PagesController extends Controller
{
    
    public function home(){
    $maincats = Maincat::all();
    $subcats = Subcat::all();
    $mssgs = Message::all();
    $products = Product::orderby('id' , 'desc')->paginate(3);
    return view('public.home')->with('maincats' ,$maincats )->with('subcats' , $subcats)->with('products',$products)->with('mssgs' , $mssgs);
    }

    public function Getmainitem($id)
    {
    $maincats = Maincat::all();
    $subcats = Subcat::all();
    $main = Maincat::where('id' , '=' , $id)->first();
    $products = Product::where('product_maincat_id' ,'=' , $id)->paginate(3);
    $mssgs = Message::all();

    return view ('public.maincat_products')->with('products' , $products)->with('maincats' ,$maincats )->with('subcats' , $subcats)->with('main' ,$main)->with('mssgs' , $mssgs);
    }

    public function SubcatProducts ($id){

    $maincats = Maincat::all();
    $subcats = Subcat::all();
    $sub = Subcat::find($id);
    $mssgs = Message::all();
    $products = Product::where('product_subcat_id' ,'=' , $id)->get();
    return view ('public.subcat_products')->with('products' , $products)->with('maincats' ,$maincats )->with('subcats' , $subcats)->with('sub' , $sub)->with('mssgs' , $mssgs);
    }

    public function getdetails ($id)
    {
    $maincats = Maincat::all();
    $subcats = Subcat::all();
    $mssgs = Message::all();

    $product = Product::find($id);
    return view('public.product_details')->with('product', $product)->with('maincats', $maincats)->with('subcats', $subcats)->with('mssgs', $mssgs);
    }












}
