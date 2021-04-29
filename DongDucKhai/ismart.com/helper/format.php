<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}

function show_status($status)
{
    $status_list = array(
        '1'=>'Còn hàng',
        '2'=>'Hot',
        '3'=>'Hết hàng'
    );
    if(array_key_exists($status,$status_list)){
        return $status_list[$status];
    }
}