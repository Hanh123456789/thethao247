<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\adminCreateProduct;
use App\Http\Requests\adminUpdateProduct;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductType;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){
        $query_products = Product::with('product_type','imagess');
        $typeproducts = ProductType::get();
        $products = is_null($request->get('catetyppe')) ? $query_products : $query_products->where('id_type', $request->get('catetyppe'));
        if(!is_null($request->get('search'))){
            $products = $products->where('name','LIKE','%'.$request->get('search').'%');
        }
        $products= $products->orderBy('id', 'DESC')
            ->paginate(10)
            ->appends(request()
                ->query());
        return view('admin.product.index',compact('products','typeproducts'));
    }
    public function create(){
        $producttypes = ProductType::get();
        $news = Product::select('new')->distinct()->get();
        return view('admin.product.add',compact('producttypes','news'));
    }
    public function store(adminCreateProduct $request){
        $data = $request->getData();
        $data['create_by']=Auth::guard('admin')->id();
        $product = Product::create($data);
        if ($product){
            $product_id = $product->id;
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $image_random = Str::random(4);
                    $name = $image_random . '.' . $image->getClientOriginalName();
                    $image->move(public_path() . '/images/', $name);
                    $data2 = [
                        'id_product'=>$product_id,
                        'images' => $name
                    ];
                    Images::create($data2);
                }
            }
            return redirect()->route('product_index')->with('msg','Thêm sản phẩm thành công');
        }else{
            return redirect()->route('product_index')->with('msg','Thêm sản phẩm thất bại');
        }
    }
    public function edit($id){
        $product = Product::with('product_type','imagess')->findOrFail($id);
        $producttypes = ProductType::get();
        $news = Product::select('new')->distinct()->get();
        return view('admin.product.edit',compact('product','producttypes','news'));
    }
    public function update($id,adminUpdateProduct $request)
    {
        $product = Product::findOrFail($id);
        $data = $request->getData();
        $data['create_by']=Auth::guard('admin')->id();
        $img_old = $request->images_old;
        if (!empty($img_old)) {
            foreach ($img_old as $img) {
                $path = 'images/' . $img;
                File::delete($path);
                $id_img = Images::where('id_product',$id)->first();
                $del_img = Images::findOrFail($id_img->id);
                $del_img->delete();
            }
        }

        if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                $image_random = Str::random(4);
                $name = $image_random . '.' . $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data2 = [
                    'id_product'=>$id,
                    'images' => $name
                ];
                Images::create($data2);
            }
        }
       $up_product =  $product->update($data);
        if ($up_product){
            return redirect()->route('product_index')->with('msg','Sửa sản phẩm thành công');
        }else{
            return redirect()->route('product_index')->with('msg','Sửa sản phẩm thất bại');
        }


    }
    public function deletenew(Request $request){
        $id = $request->aId;
        $product = Product::findOrFail($id);
        $data =['new'=>0];
        $product->update($data);
        echo "";

    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $img_old = Images::where('id_product',$id)->get();
        if (!empty($img_old)) {
            foreach ($img_old as $img) {
                $path = 'images/' . $img->images;
                File::delete($path);
                $id_img = Images::where('id_product',$id)->first();
                $del_img = Images::findOrFail($id_img->id);
                $del_img->delete();
            }
        }
        $del_product =  $product->delete();
        if ($del_product){
            return redirect()->route('product_index')->with('msg','Xóa sản phẩm thành công');
        }else{
            return redirect()->route('product_index')->with('msg','Xóa sản phẩm thất bại');
        }

    }
}
