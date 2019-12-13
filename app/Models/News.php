<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable =['id','name','images','description','detail','count','created_at','updated_at'];
    public function comment(){
        return $this->hasMany('App\Models\CommentNew','id_new','id');
    }
    public function getCountAttribute(){
       return $this ->comment()->count();
    }
}
