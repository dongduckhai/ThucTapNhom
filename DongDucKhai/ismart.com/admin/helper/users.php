<?php

function is_login()
{
    if(isset($_SESSION['is_login'])){
        return true;
    }
    return false;
}

function user_login()
{
    if(!empty($_SESSION['user_login']))
    {
        return $_SESSION['user_login'];
    }
    return false;
}

function info_user($label = 'id')
{
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$user_login}' ");
    return $user[$label];
}

function info_user_name()
{
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$user_login}' ");
    $str = explode(" ",$user['fullname']);
    $count = count($str);
    $name = $str[$count-1];
    return $name;
}

function user_role()
{
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$user_login}' ");
    $role = $user['role'];
    return $role;
}

