<?php
function get_search_page_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_pages` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_search_post_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_posts` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_category_by_cat_id($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_cats` WHERE `cat_id` = {$id}") ;
    return $result['content'];
}

function get_search_cat_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_cats` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_search_brand_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_brands` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_brand_by_brand_id($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_brands` WHERE `brand_id` = {$id}") ;
    return $result['content'];
}

function get_search_product_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_products` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_search_order_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_orders` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_search_customer_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_customers` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}
?>