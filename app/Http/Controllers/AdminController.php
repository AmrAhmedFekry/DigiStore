<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests;

class AdminController extends Controller
{
    
public function Admin ()
{
	
	$mssgs = Message::all();
	return view('admin.home')->with('mssgs' , $mssgs);
}







}
