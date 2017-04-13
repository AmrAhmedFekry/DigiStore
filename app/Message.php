<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public $fillable = [ 'id', 'email' , 'name' , 'message'];

}
