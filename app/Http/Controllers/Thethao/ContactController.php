<?php

namespace App\Http\Controllers\TheThao;

use App\Http\Requests\createContactRequest;
use App\Models\BillDetail;
use App\Models\Carts;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $producttypes =ProductType::get();
        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart_header = Carts::where('id_user',$id_user)->get();
        }else{
            $cart_header = "";
        }
        return view('thethao.contact.index',compact('producttypes','cart_header'));
    }
    public function postcontact(createContactRequest $request){
        $data = $request->getData();
        Contact::create($data);
        return redirect()->route('lienhe')->with('msg','Bạn đã gửi liên hệ thành công');
    }
}
