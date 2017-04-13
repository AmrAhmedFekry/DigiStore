<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@home');
Auth::routes();
Route::get('/Getmainitems/{id}' , 'PagesController@Getmainitem')->name('mainitems');
Route::get('/Getsubitems/{id}' , 'PagesController@SubcatProducts')->name('subitems');
Route::get('/productdetails/{id}', 'PagesController@getdetails')->name('getdetails');
Route::get('/home', 'HomeController@index');

Route::get('/back' , 'AdminController@Admin')->middleware('auth')->name('back');
Route::get('/logout', 'Auth\LoginController@logout'); 
Route::resource('/member' , 'MemberController');
Route::resource('/maincat' , 'MainCatController');

Route::resource('/subcat' , 'SubCatController');

Route::resource('/product' , 'ProducsController');



Route::post('/ajax/getcats' , 'AjaxController@loadCats')->name('maincats');

Route::resource('/message' , 'MessagesController');


Route::get('/mail' , 'PagesController@sendeamil');

Route::get('/ajax/getaddmemberpage' , function(){
return view('admin.add_member');
})->name('getaddmemmeber');



Route::get('/ajax/getallmessages' , 'AjaxController@allmessgs')->name('allmessags');

Route::post('/ajax/search' , 'AjaxController@search')->name('search');