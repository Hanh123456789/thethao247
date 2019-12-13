<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentNew extends Model
{
    protected $table = "comentnews";
    protected $fillable = ['id','id_new','id_user','content','id_parent','created_at','updated_at'];
    public function news(){
        return $this->belongsTo('App\Models\News','id_new','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
