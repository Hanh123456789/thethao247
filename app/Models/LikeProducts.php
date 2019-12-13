<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeProducts extends Model
{
    protected $table = "likeproducts";
    protected $fillable = ['id','id_product','id_user','created_at','updated_at'];
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
