<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";
    protected $fillable = ['name', 'parent_id','created_at','updated_at'];
    public function product(){
        return $this->hasMany('App\Models\Product','id_type','id');
    }
}
