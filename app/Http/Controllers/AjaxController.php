<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Maincat ;
use App\Subcat ;
use App\Message;
use App\Product;


class AjaxController extends Controller
{
    //
    public function loadCats(Request $request){
    $maincat_id =   $request->input('maincat_id');     
    $subcats = Subcat::where('maincat_id' , '=' , $maincat_id)->get();
    return $subcats->toJson();  

    }

    public function allmessgs(){
    	$messages = Message::all();
    	return view('admin.all_messages')->with('messages',$messages);

    }
    public function search (Request $request){
        $search = $request->input('search_value');
        $products =Product::where('product_tags','like','%'.$search.'%')->orderBy('id')->get();         
        return json_encode($products) ;

    }
}
