<?php
/* các hàm làm việc với database */

function add_user($data)
{
    return db_insert('tbl_users',$data);
}

function delete_user_outdate($time)
{
    $where = "`is_active` = '0' AND `reg_date` < ({$time} - 10000) ";
    return db_delete('tbl_users', $where);
}

function update_reset_token($data, $email)
{
    $where = "`email` = '{$email}'";
    db_update('tbl_users', $data, $where);
}

function update_password($data, $reset_token)
{
    $where = "`reset_token` = '{$reset_token}'";
    db_update('tbl_users', $data, $where);
}

function update_user_login($username, $data)
{
    db_update('tbl_users', $data, "`username` = '{$username}'");
}

function user_exists($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' OR `username` = '{$username}'");
    if($check_user > 0) return true;
    return false;
}

function get_user_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '{$id}' ");
    return $item;
}

function get_user_by_username($username)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' ");
    return $item;
}

function active_user($active_token)
{
    return db_update('tbl_users', array('is_active' => 1), "`active_token` = '{$active_token}' ");
    /* cái tham số thứ 2 là 1 mảng gồm các trường giá trị mà ta muốn thay đổi 
       ở đây chỉ thay đổi 1 trường nên mảng sẽ là array('is_active'=>1)  */
}

function check_active_token($active_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    /* is_active kiểu dữ liệu là enum nó là dạng chuỗi nên 0 phải viết dạng chuỗi */
    if($check > 0) return true;
    return false;
}

function check_login($username, $password)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}' ");
    if($check_user > 0){
        return true;
    }
    else return false;
}

function check_email($email)
{
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' AND `is_active` = '1' ");
    /* is_active kiểu dữ liệu là enum nó là dạng chuỗi nên 1 phải viết dạng chuỗi */
    if($check_email > 0){
        return true;
    }
    else return false;
}

function check_old_pass($username,$old_pass)
{
    $check_old_pass = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$old_pass}' ");
    if($check_old_pass > 0){
        return true;
    }
    else return false;
}

function check_reset_token($reset_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}' ");
    if($check > 0) return true;
    return false;
}


