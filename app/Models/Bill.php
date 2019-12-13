<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $fillable = ['id','id_customer','date_order','total','status','shipmoney','km','created_at','updated_at'];
    public function bill_detail(){
        return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }
    public function customer(){
        return $this ->belongsTo('App\User','id_customer','id');
    }
    public function getNgayAttribute($date)
    {
        $dt = is_null($date) ? Carbon::now() : new Carbon($date);
        return  $dt->format('d-m-Y');
    }
}
