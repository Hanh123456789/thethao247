<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
