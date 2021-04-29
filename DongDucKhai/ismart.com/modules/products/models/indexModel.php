<?php
function get_product_list_have_same_brand($start,$num_per_page,$where = "",$order_by = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    if(!empty($order_by)){
        $order_by = "ORDER BY {$order_by}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_products` {$where} {$order_by} LIMIT {$start},{$num_per_page}");
    return $list;
}
function get_brand_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_brands` WHERE `brand_id` = {$id} ");
}
function get_cat_content_by_brand($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_cats` WHERE `cat_id` = {$id}");
    return $result['content'];
}
/* productIndex */

function get_product_index_have_same_brand($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `brand_id` = {$id}");
    return $result;
} 

function get_product_total_have_same_brand($id)
{
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `brand_id` = '{$id}' ");
}
/* homeProduct 2 */
function get_product_total_have_same_cat($cat)
{
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `cat_id` = '{$cat}' ");
}
function get_product_index_have_same_cat($cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = {$cat_id}");
    return $result;
}
/* homeProduct */

function get_product_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `code` = '{$id}' ");
}
function get_cat_content_by_cat_id($id)
{
    $result =  db_fetch_row("SELECT `content` FROM `tbl_cats` WHERE `cat_id` = '{$id}' ");
    return $result['content'];
}
function get_product_slide_have_same_brand($brand_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `brand_id` = '{$brand_id}' ");
    return $result;
}
/* productDetail */
?>