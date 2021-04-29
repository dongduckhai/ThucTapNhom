<?php
function get_customer_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_customers` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_num_customer()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_customers`");
    return $num_row;
}
/* customerIndexAction */
function update_customer($id, $data)
{
    db_update("tbl_customers",$data,"`cus_id` = {$id}");
}

function get_customer_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `cus_id` = {$id}") ;
}

function get_order_list_by_cus_id($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_orders` {$where} LIMIT {$start},{$num_per_page} ");
    return $list;
}

function get_num_customer_order_list($id)
{
    $num_row = db_num_rows("SELECT * FROM `tbl_orders` WHERE `cus_id` = {$id}" );
    return $num_row;
}
    /* customerDetailAction */
    function get_order_list($start,$num_per_page,$where = "")
    {
        if(!empty($where)){
            $where = "WHERE {$where}";
        }
        $list = db_fetch_array("SELECT * FROM `tbl_orders` {$where} LIMIT {$start},{$num_per_page}");
        return $list;
    }
    
function get_num_order()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_orders`");
    return $num_row;
}
    /* orderIndex */
function update_order($id, $data)
{
    db_update("tbl_orders",$data,"`order_id` = {$id}");
}
function get_order_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_orders` WHERE `order_id` = {$id}") ;
}
    /* updateOrder */
function delete_order($id)
{
    db_delete("tbl_orders","`order_id` = {$id}");
    redirect("?mod=order&controller=order&action=orderIndex");
}
    /* deleteOrderAction  trong orderController*/
function delete_order_per_customer($id, $cus_id)
{
    db_delete("tbl_orders","`order_id` = {$id}");
    redirect("?mod=order&controller=customer&action=detailCustomer&id={$cus_id}");
}
/* deleteOrderAction trong cusController */
?>