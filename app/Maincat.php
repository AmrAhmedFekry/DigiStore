<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Maincat extends Model
{
       protected $fillable = [
        'id', 'maincat_name',
    ];


    public function subcat (){
    	return $this->hasMany('App\Subcat');
    }

}
