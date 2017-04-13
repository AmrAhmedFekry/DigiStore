<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Message;
use Session;
use App\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $members = User::all(); 
     return view('admin.all_members')->with('members' , $members);      
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mssgs = Message::all();
        return view('admin.add_member')->with('mssgs' , $mssgs);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    $member= new User ; 
    $member->name=$request->input('name');
    $member->email=$request->input('email');
    $member->password = bcrypt($request->input('password'));
    $member->save();
    $members = User::all(); 
    Session::flash('success', 'The Member was successfully save!');
    return view('admin.all_members')->with('members' , $members);      



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
         $member = User::find($id);
        $mssgs = Message::all();
         return view('admin.single_member')->with('member' , $member)->with('mssgs' , $mssgs);
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
$member = User::find($id);
  
  if ($request->email == $member->email) {
     $this->validate($request , array(
        'name'=>'required',
        'password'=>'required'
        ));

               
    }else{
         $this->validate($request , array(
        'email'=>'required|unique:users,email',
        'name'=>'required',
        'password'=>'required'
        ));
    }    

       $member->name= $request->name;
       $member->email= $request->email;
       $member->password = $request->password;
       $member->save();
       $members = User::all();
       Session::flash('success', 'The Member was successfully Updated!'); 
       return view('admin.all_members')->with('members' , $members);      

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

    $member = User::find($id);
    $member->delete();
    $members = User::all(); 
    Session::flash('success', 'The Member was successfully Deleted!');
    return view('admin.all_members')->with('members' , $members);      


    }
}
