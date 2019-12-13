<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentProducts extends Model
{
    protected $table = "commentproducts";
    protected $fillable = ['id','id_product','id_user','content','id_parent','created_at','updated_at'];
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
