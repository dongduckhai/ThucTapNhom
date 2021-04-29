<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}

function show_position($posistion)
{
    $posistion_list = array(
        '1'=>'Quản lý',
        '2'=>'Thư ký',
        '3'=>'Cộng tác viên'
    );
    if(array_key_exists($posistion,$posistion_list)){
        return $posistion_list[$posistion];
    }
}

function show_status_product($status)
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

function show_status_post($status)
{
    $status_list = array(
        '1'=>'Bình thường',
        '2'=>'Hot',
    );
    if(array_key_exists($status,$status_list)){
        return $status_list[$status];
    }
}

function show_status_slider($status)
{
    $status_list = array(
        '1'=>'Không sử dụng',
        '2'=>'Sử dụng',
    );
    if(array_key_exists($status,$status_list)){
        return $status_list[$status];
    }
}

function show_status_order($status)
{
    $status_list = array(
        '1'=>'Chưa giao hàng',
        '2'=>'Đang giao hàng',
        '3'=>'Đã giao hàng xong'
    );
    if(array_key_exists($status,$status_list)){
        return $status_list[$status];
    }
}


