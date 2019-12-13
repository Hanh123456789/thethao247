 @php
  $rating = $products->product->rating($products->product->id);
 @endphp
@if($rating<1)
  <div class="pro-rating">
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;" ></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<1.5 && $rating>=1 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star" style="font-size: 20px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;" ></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<1.9 && $rating>=1.5 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-half"  style="font-size: 19px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<2.5 && $rating>=1.9 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<2.9 && $rating>=2.5 )
  <div class="pro-rating"  style="font-size: 18px;color: #ff7f00;">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-half"  style="font-size: 19px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<3.5 && $rating>=2.9 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>

  </div>
@elseif($rating<3.9 && $rating>=3.5 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-half"  style="font-size: 19px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<4.5 && $rating>=3.9 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-outline"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@elseif($rating<4.9 && $rating>=4.5 )
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star-half"  style="font-size: 19px;color: #ff7f00;"></i>
  </div>
@else
  <div class="pro-rating">
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
    <i class="zmdi zmdi-star"  style="font-size: 18px;color: #ff7f00;"></i>
  </div>
@endif
