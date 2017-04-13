<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    //
protected $fillable = [ 'maincat_id', 'subcat_name' , 'maincat_name' ];


    public function maincat ()
    {
    	return $this-> belongsTo('App\Maincat');
    }
}
