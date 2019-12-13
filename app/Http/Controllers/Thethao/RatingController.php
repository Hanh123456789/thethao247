<?php

namespace App\Http\Controllers\TheThao;

use App\Models\CommentProducts;
use App\Models\Rating;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function danhgia(Request $request){
        $mess = $request->mess;
        $id = $request->bid;
        $id_user = Auth::user()->id;
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
            'vote'=>$mess
        ];
        Rating::create($data);

        if ($mess> 1) {
            $msg = "Cảm ơn! Bạn đã xếp hạng này ".$mess." sao.";
        }else{
            $msg = "Chúng tôi sẽ cải thiện sản phẩm. Bạn đã xếp hạng này ".$mess." sao.";
    }
        echo $msg;
    }
}
