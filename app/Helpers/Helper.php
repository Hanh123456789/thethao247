<?php

namespace App\Helpers;

class Helper
{
    public static function set_tab($scope)
    {
        $active = $scope == 1 ? 'active' : '';
        return $active;
    }

    public static function set_selected($val, $origin)
    {
        $active = $val == $origin ? 'selected' : '';
        return $active;
    }
    public static function set_checked($val, $origin)
    {
        $active = $val == $origin ? 'checked' : '';
        return $active;
    }
    public static function human($val)
    {
        if ($val == null){
            $count = 0;
        }else{
            $count =$val;
        }
        return $count;
    }


}
