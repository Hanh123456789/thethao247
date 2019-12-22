@if($rating == 0 )
  <li class='star' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Good' id="{{$bill->id_product}}"  data-value='3'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  @elseif($rating == 1 )
    <li class='star selected' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
      <i class='fa fa-star fa-fw'></i>
    </li>
    <li class='star' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
      <i class='fa fa-star fa-fw'></i>
    </li>
    <li class='star' title='Good' id="{{$bill->id_product}}"  data-value='3'>
      <i class='fa fa-star fa-fw'></i>
    </li>
    <li class='star' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
      <i class='fa fa-star fa-fw'></i>
    </li>
    <li class='star' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
      <i class='fa fa-star fa-fw'></i>
    </li>
@elseif($rating == 2)
  <li class='star selected' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Good' id="{{$bill->id_product}}"  data-value='3'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
    <i class='fa fa-star fa-fw'></i>
  </li>
 @elseif($rating == 3)
  <li class='star selected' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Good' id="{{$bill->id_product}}"  data-value='3'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
    <i class='fa fa-star fa-fw'></i>
  </li>
@elseif($rating == 4)
  <li class='star selected' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Good' id="{{$bill->id_product}}"  data-value='3'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
    <i class='fa fa-star fa-fw'></i>
  </li>
 @else
  <li class='star selected' title='Poor' id="{{$bill->id_product}}"  data-value='1'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Fair' id="{{$bill->id_product}}"   data-value='2'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Good' id="{{$bill->id_product}}"  data-value='3'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='Excellent' id="{{$bill->id_product}}" data-value='4'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  <li class='star selected' title='WOW!!!' id="{{$bill->id_product}}" data-value='5'>
    <i class='fa fa-star fa-fw'></i>
  </li>
  @endif

