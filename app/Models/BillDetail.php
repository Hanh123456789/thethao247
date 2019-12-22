<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BillDetail extends Model
{
    protected $table = "bill_detail";
    protected $fillable = ['id','id_bill','id_product','quantity','unit_price','created_at','updated_at'];
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function bill(){
        return $this->belongsTo('App\Models\Bill','id_bill','id');
    }
    public function ratingsao($id){
        $id_user = Auth::user()->id;
        $rating  = Rating::where('id_user',$id_user)->where('id_product',$id)->orderBy('id','DESC')->first();
        if ($rating==""){
            return 0;
        }else{
           return $rating->vote;
        }
    }
}
