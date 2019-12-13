<?php

namespace App\Http\Controllers\Thethao;

use App\Models\Carts;
use App\Models\CommentNew;
use App\Models\News;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request){

        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        if(!is_null($request->count)){
           if ($request->count == ""){
               $news = News::orderBy('id', 'DESC');
           }else{
               $news = News::orderBy('count', 'DESC');
           }
        }else{
            $news = News::orderBy('id', 'DESC');
        }
        if(!is_null($request->search)){ $news = News::where('name','LIKE','%'. $request->search.'%'); }
        $news = $news
            ->paginate(10)
            ->appends(request()
                ->query());
        return view('thethao.news.index',compact('producttypes','cart_header','news'));
    }
    public function detail($slug,$id,Request $request){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        $new = News::findOrFail($id);
        $bolog_key = 'blog_'.$id;
        if (!($request->session()->has($bolog_key ))){
            $new->increment('count');
            $request->session()->put($bolog_key,1);
        }
        $news_hight = News::orderBy('count','DESC')->paginate(10);
        $comments_parent = CommentNew::with('news','user')->where('id_parent',0)->where('id_new',$id)->get();
        $comments_con= CommentNew::with('news','user')->where('id_parent','!=',0)->where('id_new',$id)->get();
        return view('thethao.news.detail',compact('producttypes','cart_header','new','news_hight','comments_parent','comments_con'));
    }
}
