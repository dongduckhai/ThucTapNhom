<?php
/* các hàm làm việc với database */

function add_customer($data)
{
    return db_insert('tbl_customers',$data);
}

function delete_customer_outdate($time)
{
    $where = "`is_active` = '0' AND `reg_date` < ({$time} - 100) ";
    return db_delete('tbl_customers', $where);
}

function update_reset_token($data, $email)
{
    $where = "`email` = '{$email}'";
    db_update('tbl_customers', $data, $where);
}

function update_password($data, $reset_token)
{
    $where = "`reset_token` = '{$reset_token}'";
    db_update('tbl_customers', $data, $where);
}

function update_customer_login($username, $data)
{
    db_update('tbl_customers', $data, "`username` = '{$username}'");
}

function customer_exists($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_customers` WHERE `email` = '{$email}' OR `username` = '{$username}'");
    if($check_user > 0) return true;
    return false;
}

function get_list_customers()
{
    $result = db_fetch_array("SELECT * FROM `tbl_customers`");
    return $result;
}

function get_customer_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `customer_id` = '{$id}' ");
    return $item;
}

function get_customer_by_username($username)
{
    $item = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '{$username}' ");
    return $item;
}

function check_active_token($active_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_customers` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    /* is_active kiểu dữ liệu là enum nó là dạng chuỗi nên 0 phải viết dạng chuỗi */
    if($check > 0) return true;
    return false;
}

function active_customer($active_token)
{
    return db_update('tbl_customers', array('is_active' => 1), "`active_token` = '{$active_token}' ");
    /* cái tham số thứ 2 là 1 mảng gồm các trường giá trị mà ta muốn thay đổi 
       ở đây chỉ thay đổi 1 trường nên mảng sẽ là array('is_active'=>1)  */
}

function check_login($username, $password)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_customers` WHERE `username` = '{$username}' AND `password` = '{$password}' AND `is_active` = '1' ");
    if($check_user > 0){
        return true;
    }
    else return false;
}

function check_email($email)
{
    $check_email = db_num_rows("SELECT * FROM `tbl_customers` WHERE `email` = '{$email}' AND `is_active` = '1' ");
    /* is_active kiểu dữ liệu là enum nó là dạng chuỗi nên 1 phải viết dạng chuỗi */
    if($check_email > 0){
        return true;
    }
    else return false;
}

function check_old_pass($username,$old_pass)
{
    $check_old_pass = db_num_rows("SELECT * FROM `tbl_customers` WHERE `username` = '{$username}' AND `password` = '{$old_pass}' ");
    if($check_old_pass > 0){
        return true;
    }
    else return false;
}

function check_reset_token($reset_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_customers` WHERE `reset_token` = '{$reset_token}' ");
    if($check > 0) return true;
    return false;
}


