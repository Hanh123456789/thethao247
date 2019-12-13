<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating";
    protected $fillable = ['id','id_product','id_user','vote','created_at','updated_at'];
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
