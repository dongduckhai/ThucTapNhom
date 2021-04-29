<?php

function is_login()
{
    if(isset($_SESSION['cus_is_login'])){
        return true;
    }
    return false;
}

function user_login()
{
    if(!empty($_SESSION['cus_login']))
    {
        return $_SESSION['cus_login'];
    }
    return false;
}

function info_customer()
{
    $user_login = $_SESSION['cus_login'];
    $user = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '{$user_login}' ");
    return $user;
}

/* function info_customer_name()
{
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '{$user_login}' ");
    $str = explode(" ",$user['fullname']);
    $count = count($str);
    $name = $str[$count-1];
    return $name;
} */