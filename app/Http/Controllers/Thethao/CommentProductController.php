<?php

namespace App\Http\Controllers\TheThao;

use App\Models\CommentNew;
use App\Models\CommentProducts;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentProductController extends Controller
{
    public function comment1(Request $request){
        $mess = $request->mess;
        $id = $request->bid;
        $id_user = Auth::user()->id;
        $date = Carbon::now();
        $user = User::findOrFail($id_user);
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
            'content'=>$mess,
            'id_parent'=>0
        ];
        CommentProducts::create($data);
        echo '  <div class="media mt-30">
                  <div class="media-left pr-30">
                    <a href="#"><img class="hinh-anh-comment media-object" src="../public/images/'.$user->images.'" alt="#"></a>
                  </div>
                  <div class="media-body">
                    <div class="clearfix">
                      <div class="name-commenter f-left">
                        <h6 class="media-heading chu-comment"><a href="#">'.$user->name.'</a></h6>
                        <p class="mb-10">'.$date.'</p>
                      </div>
                    </div>
                    <p class="mb-0">'.$mess.'</p>
                  </div>
                </div>';
    }
    public function comment2(Request $request){
        $mess = $request->mess;
        $id = $request->cid;
        $cid =$request->bid;
        $id_user = Auth::user()->id;
        $data = [
            'id_product'=>$id,
            'id_user'=>$id_user,
            'content'=>$mess,
            'id_parent'=>$cid
        ];
        $date = Carbon::now();
        CommentProducts::create($data);
        $user = User::findOrFail($id_user);
        echo '<div class="media mt-30" style="margin-left: 12%;margin-top: 10px">
                          <div class="media-left pr-30">
                            <a href="#"><img class="hinh-anh-comment-con media-object" src="../public/images/'.$user->images.'" alt="#"></a>
                          </div>
                          <div class="media-body">
                            <div class="clearfix">
                              <div class="name-commenter f-left">
                                <h6 class="media-heading chu-comment" style="font-size: 11px"><a href="#">'.$user->name.'</a></h6>
                                <p class="mb-10" style="font-size: 11px">'.$date.'</p>
                              </div>
                            </div>
                            <p class="mb-0">'.$mess.'</p>
                          </div>
                        </div>';
    }
}
