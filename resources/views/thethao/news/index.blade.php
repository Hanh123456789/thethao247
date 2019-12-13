@extends('templates.thethao.master')
@section('main')
@section('title','Tin tức')
  <!-- Start page content -->
  <div id="page-content" class="page-wrapper">

    <!-- BLOG SECTION START -->
    <div class="blog-section mb-50">
      <div class="container">
        <div class="row">
          <!-- blog-option start -->
          <div class="col-md-12">
                      <aside class="widget widget-categories box-shadow" style="margin-bottom: 50px;padding-bottom: 0px">
                    <div id="cat-treeview" class="product-cat">
                      <form action="" method="get" id="form-search">
                          <select name="count" id="choose-categories">
                            <option value="" style="font-size: 13px;color: dimgrey;">Tất cả</option>
                            <option value="hight"
                                    @php
                                      if (request()->get('count')=='hight'){
                                              echo 'selected';
                                      }else{
                                      echo "";
                                      }
                                    @endphp
                                    style="font-size: 13px;color: dimgrey;">Bài viết có lượt đọc cao</option>
                          </select>
                        <input type="text" name="search" style="width: 25%;
    /* margin-top: 3px; */
    padding-top: -1px;
    height: 30px;" placeholder="Tìm kiếm tin tức....">
                      </form>
                    </div>
                  </aside>
          </div>
          <!-- blog-option end -->
        </div>
        <div class="row">
        @foreach($news as $new)
          <!-- blog-item start -->
          <div class="col-md-6">
            <div class="blog-item-2">
              <div class="row">
                <div class="col-md-4">
                  @php
                    $str =str_slug($new->name);
                  @endphp
                  <div class="blog-image">
                    <a href="{{route('chitiettintuc',[$str,$new->id])}}"><img src="../public/images/{{$new->images}}" alt=""></a>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="blog-desc">
                    <h5 class="pro-name"><a href="{{route('chitiettintuc',[$str,$new->id])}}">{{$new->name}}</a></h5>
                    <div class="createdate">{{$new->created_at}}</div>
                    <p class="description-news">{{$new->description}}</p>
                    <div class="read-more">
                      <a href="#">Xem thêm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- blog-item end -->
        </div>
        <div class="pagination" style="
margin-left: 45%">
          {{$news->links()}}
        </div>
      </div>
    </div>
    <!-- BLOG SECTION END -->
  </div>
@stop