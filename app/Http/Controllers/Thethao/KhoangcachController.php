<?php

namespace App\Http\Controllers\Thethao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhoangcachController extends Controller
{
public function khoangcach(Request $request)
{
    $lat2 = $request->aLat;
    $lon2 = $request->aLon;
    $tien = $request->aTien;
    $sokm = $this->distance(16.0682538, 108.1540602, $lat2, $lon2, "K");
    $sokm = ceil($sokm);
    if ($sokm <= 2 && $tien <= 100000) {
        $tienship = $sokm * 5000;
    }elseif ($sokm<=2 && $tien>100000){
        $tienship=0;
    }elseif ($tien<5000000){
        $tienship = $sokm*3000;
    }else{
        $tienship = 0;
    }
    $tongtien = $tienship+$tien;
    $tongtien = number_format($tongtien);
    echo number_format($tienship),'-', $tienship,'-',$tongtien,'-',$sokm;
}
public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}
}
}
