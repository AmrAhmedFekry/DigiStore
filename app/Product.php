<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{

public $fillable = [ 'id', 'product_name' , 'product_price' , 'product_image','product_maincat_id','product_subcat_id','product_details' , 'maincat_name','subcat_name' ,'product_tags'];

}
