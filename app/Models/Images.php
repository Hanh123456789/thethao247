<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "images";
    protected $fillable =['id','id_product','images','created_at','updated_at'];

    public function product(){
        return $this->belongsTo('App\Models\Product','','id_product','id');
    }

}
