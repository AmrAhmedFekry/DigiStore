<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Subcat;
use App\Maincat ;
class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subcats = Subcat::all();
         return view('admin.all_subcats')->with('subcats' , $subcats);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $maincats = Maincat::all();
        return view('admin.add_subcat')->with('maincats' , $maincats);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subcat = new Subcat ; 
        $maincat = Maincat::where('id' , '=' , $request->maincat_id)->first();
        $subcat->subcat_name = $request->input('subcat_name');
        $subcat->maincat_id  = $request->input('maincat_id');
        $subcat->maincat_name  = $maincat->maincat_name; 



        $subcat->save();
        $maincats = Maincat::all();
        $subcats = Subcat::all();
        Session::flash('success' , 'The SubCat was successfully saved');
        return view('admin.all_subcats')->with('subcats' , $subcats);
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

        $subcat = Subcat::find($id);
        $maincats = Maincat::all(); 
        return view('admin.single_subcat')->with('subcat' , $subcat)->with('maincats',$maincats);
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

       $subcat = Subcat::find($id);
       $maincat = Maincat::find($request->maincat_id);
       $subcat->subcat_name = $request->subcat_name;
       $subcat->maincat_id  = $request->maincat_id;
       $subcat->maincat_name = $maincat->maincat_name;
       $subcat->save();
       $subcats = Subcat::all();
       Session::flash('success', 'The category was successfully updated!');
       return view('admin.all_subcats')->with('subcats' , $subcats);




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
        $subcat = Subcat::find($id);
        $subcat->delete();
        $subcats = Subcat::all();
        Session::flash('success', 'The category was successfully updated!');
        return view('admin.all_subcats')->with('subcats' , $subcats);

    }
}
