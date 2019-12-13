<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\productTypeCreateRequest;
use App\Http\Requests\productTypeUpdateRequest;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    public function index(){
    	$producttypes = ProductType::get();
    	return view('admin.producttype.index',compact('producttypes'));
    }
    public function create(){
        $producttypes = ProductType::get();
        return view('admin.producttype.add',compact('producttypes'));
    }
    public function store(productTypeCreateRequest $request){

        $data = $request->getData();
        $productype = ProductType::create($data);
        if ($productype){
            return redirect()->route('product_type_index')->with('msg','Thêm danh mục sản phẩm thành công');
        }else{
            return view('product_type_index')->with('msg','Thêm danh mục sản phẩm thất bại');
        }

    }
    public function edit($id){
        $producttype = ProductType::FindOrFail($id);
        return view('admin.producttype.edit',compact('producttype','id'));
    }
    public function update(productTypeUpdateRequest $request,$id){
        $producttype = ProductType::FindOrFail($id);
       $data['parent_id']= $producttype->parent_id;
       $data = $request->getData();
        $productype=$producttype->update($data);
        if ($productype){
            return redirect()->route('product_type_index')->with('msg','Sửa danh mục sản phẩm thành công');
        }else{
            return view('product_type_index')->with('msg','Sửa danh mục sản phẩm thất bại');
        }
    }
    public function destroy($id){
        $producttype = ProductType::FindOrFail($id);
        $product1 = Product::where('id_type',$id)->get();
        foreach ($product1 as $pro1){
            $prod1 = Product::findOrFail($pro1->id);
            $imagess = Images::where('id_product',$pro1->id)->get();
            foreach ($imagess as $image){
                $img = Images::findOrFail($image->id);
                $img->delete();
            }
            $prod1->delete();
        }
         $proall = ProductType::get();
             $a= $this->xoa($proall,$id);
        $productype=$producttype->delete();
        if ($productype){
            return redirect()->route('product_type_index')->with('msg','Xóa danh mục sản phẩm thành công');
        }else{
            return view('product_type_index')->with('msg','Xóa danh mục sản phẩm thất bại');
        }

    }
   public function xoa($producttypes,$cat_id) {
        foreach($producttypes as $producttype){
            if($producttype->parent_id==$cat_id){
                $producttype1 = ProductType::FindOrFail($producttype->id);
                $producttype1->delete();
                $product = Product::where('id_type',$producttype->id)->get();
                foreach ($product as $pro){
                    $prod = Product::findOrFail($pro->id);
                    $imagess = Images::where('id_product',$pro->id)->get();
                    foreach ($imagess as $image){
                        $img = Images::findOrFail($image->id);
                        $img->delete();
                    }
                    $prod->delete();
                }

                $this->xoa1($producttypes,$producttype1->id);
            }
        }
    }
    public function xoa1($producttypes,$cat_id) {
        foreach($producttypes as $producttype){
            if($producttype->parent_id==$cat_id){
                $producttype1 = ProductType::FindOrFail($producttype->id);
                $producttype1->delete();
                $product2 = Product::where('id_type',$producttype->id)->get();
                foreach ($product2 as $pro2){
                    $prod2 = Product::findOrFail($pro2->id);
                    $imagess = Images::where('id_product',$pro2->id)->get();
                    foreach ($imagess as $image){
                        $img = Images::findOrFail($image->id);
                        $img->delete();
                    }
                    $prod2->delete();
                }
                $this->xoa($producttypes,$producttype1->id);
            }
        }
    }

}
