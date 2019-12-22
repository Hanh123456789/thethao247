<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','id_type','create_by','entry_price','description','unit_price','promotion_price','unit','new','guarantee','trademark','created_at','updated_at','video'];
    public function product_type(){
        return $this->belongsTo('App\Models\ProductType','id_type','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\Models\BillDetail','id_product','id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\Admin','create_by','id');
    }
    public function imagess(){
        return $this->hasMany('App\Models\Images','id_product','id');
    }
    public function ratingcount(){
        return $this->hasMany('App\Models\Rating','id_product','id');
    }
    public function likeproduct(){
        return $this->hasMany('App\Models\LikeProducts','id_product','id');
    }
    public function rating($id){
       $a = $this->ratingcount()->where('id_product',$id)->avg('vote');
       return $a;
    }
    public function like($id,$id_user){
        $a = $this->likeproduct()->where('id_user',$id_user)->where('id_product',$id)->get();
        $have = false;
        if (count($a)>0){
            $have=true;
        }
        return $have;
    }
    public function getProductnewAttribute(){
        $new = $this->new;
        switch ($this->new) {
            case '1':
                $new = 'Hàng mới';
                break;
            case '0':
                $new = 'Hàng cũ' ;
                break;
        }
        return $new;
    }
    public function getHinhanhAttribute(){
        $hinhanh = $this->imagess;
        $arrcontent =[];
        foreach ($hinhanh as $hinh) {
            array_push($arrcontent, $hinh->images);
        }
         if ($arrcontent == null){
             echo "a";
         }else{
             echo $arrcontent[0];
         }
    }

}
