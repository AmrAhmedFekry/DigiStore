<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session ; 
use App\Http\Requests;
use App\Maincat ;
use App\Message ;

class MainCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maincats = Maincat::all();

        return view('admin.all_maincats')->with('maincats' , $maincats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.add_maincat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $maincat = new Maincat ; 
    $maincats = Maincat::all();
    $maincat->maincat_name = $request->input('maincat_name');
    $maincat->save();
    $maincats = Maincat::all();
    Session::flash('success','The Main Category was successfully save');
    return view('admin.all_maincats')->with('maincats' , $maincats);
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
        
     $maincat = Maincat::where('id' , '=' , $id)->first();
    // $maincat = Maincat::find($id);
     $mssgs = Message::all();
     return view ('admin.single_maincat')->with('maincat' , $maincat)->with('mssgs' , $mssgs);
    // return $maincat;
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

       $maincat = Maincat::where('id' , '=' , $id)->first();
       $maincat->maincat_name = $request->maincat_name;
       $maincat->save();
       $maincats = Maincat::all();
       session::flash('success' , 'The Category was successfully Updated');
       return view('admin.all_maincats')->with('maincats' , $maincats);
    


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
        $maincat = Maincat::where('id' , '=' , $id)->first();
        $maincat->delete();
        $maincats = Maincat::all();
        Session::flash('success', 'The Category was successfully Deleted!');
        return view('admin.all_maincats')->with('maincats' , $maincats);

    }
}
