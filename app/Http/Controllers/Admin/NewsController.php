<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\createNewsRequest;
use App\Http\Requests\updateNewsRequest;
use App\Models\CommentNew;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Request $request){
        if (is_null($request->search)){
            $news = News::orderBy('created_at','DESC')->paginate(10);
        }else{
            $news = News::where('name','LIKE','%'.$request->search.'%')->orderBy('created_at','DESC')->paginate(10)->appends(request()
                ->query());
        }
        return view('admin.news.index',compact('news'));
    }
    public function create(){
        return view('admin.news.add');
    }
    public function store(createNewsRequest $request){
        $data = $request->getData();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $data['images'] = $filename;
        }
        News::create($data);
        return redirect()->route('new_index')->with('msg','Thêm tin tức thành công');
    }
    public function edit($id){
        $new = News::findOrFail($id);
        return view('admin.news.edit',compact('new'));
    }
    public function update(updateNewsRequest $request,$id){
        $new=News::findOrFail($id);
        $data = $request->getData();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $data['images'] = $filename;
        }else{
            $data['images'] = $new->images;
        }
        $new->update($data);
        return redirect()->route('new_index')->with('msg','Sửa tin tức thành công');
    }
    public function destroy($id){
        $new=News::findOrFail($id);
        $comments = CommentNew::where('id_new',$id)->get();
        foreach ($comments as $comment){
            $cm = CommentNew::findOrFail($comment->id);
            $cm->delete();
        }
        $new->delete();
        return redirect()->route('new_index')->with('msg','Xóa tin tức thành công');
    }
}
