<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = "carts";
    protected $fillable = ['id','id_user','id_product'];
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product');
    }
public function imagecart($id){
        $a = Images::where('id_product',$id)->first();
        return $a;
}
}
