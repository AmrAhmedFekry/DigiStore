<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Message;
use Session;
use App\Maincat ;
use App\Subcat ;
use App\Product;

class ProducsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $mssgs = Message::all();
        $products = Product::all();
        return view('admin.allproduct')->with('products' , $products)->with('mssgs' , $mssgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
     $maincats = Maincat::all();
     $mssgs = Message::all();
        return view('admin.add_products')->with('maincats' , $maincats)->with('mssgs' , $mssgs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $imageName = time().'.'.$request->file('product_image')->getClientOriginalExtension();
        $image =  $request->file('product_image')->move(public_path('images'), $imageName);
        
        $product = new Product ;
        $maincategory = Maincat::where('id' , '=' , $request->input('maincat_id'))->first();
        $subcategory  = Subcat::where('id' , '=' , $request->input('subcat_id'))->first();
        $product->product_name  = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_image =$imageName;
        $product->product_maincat_id =$request->input('maincat_id');
        $product->product_subcat_id =$request->input('subcat_id');
        $product->product_details  = $request->input('product_details');
        $product->product_tags  =    $request->input('product_tags');
        $product->maincat_name =     $maincategory->maincat_name;
        $product->subcat_name =     $subcategory->subcat_name;
        $product->save();
        $mssgs = Message::all();
        $products = Product::all();
        Session::flash('success' , 'The Product has been added successfully');
        return view('admin.allproduct')->with('products' , $products)->with('mssgs' , $mssgs);   
         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
        $product = Product::find($id);
        $maincats = Maincat::all();
        $mssgs = Message::all();
return view('admin.single_product')->with('maincats' , $maincats)->with('mssgs' , $mssgs)->with('product',$product);


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
  

    $product =Product::find($id);
    $maincategory = Maincat::where('id' , '=' , $request->input('maincat_category'))->first();
    $subcategory  = Subcat::where('id' , '=' , $request->input('subcat_Category'))->first();
    $product->product_name  = $request->input('product_name');
    $product->product_price = $request->input('product_price');
    $product->product_maincat_id =$request->input('maincat_category');
    $product->product_subcat_id =$request->input('subcat_Category');
    $product->product_details  = $request->input('product_details');
    $product->product_tags  =    $request->input('product_tags');
    $product->maincat_name =   $maincategory->maincat_name;
    $product->subcat_name =     $subcategory->subcat_name;
    $product->save();
    $mssgs = Message::all();
    $products = Product::all();
    Session::flash('success' , 'The Product has been Updated successfully');
    return view('admin.allproduct')->with('products' , $products)->with('mssgs' , $mssgs);
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
        $product = Product::find($id);
        $product->delete();
        $products = Product::all();
        $mssgs = Message::all();
        $products = Product::all();
        Session::flash('success', 'The Product was successfully Deleted!');
        return view('admin.allproduct')->with('products' , $products)->with('mssgs' , $mssgs);

    }

}
