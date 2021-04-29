<?php
/* các hàm làm việc với database */
function get_product_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_products` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_num_product()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_products`");
    return $num_row;
}

function get_category_by_cat_id($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_cats` WHERE `cat_id` = {$id}") ;
    return $result['content'];
}

function get_brand_by_brand_id($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_brands` WHERE `brand_id` = {$id}") ;
    return $result['content'];
}

function get_cat_dropdown()
{
    $result = db_fetch_array("SELECT * FROM `tbl_cats` ");
    return $result;
} 
/* productIndexAction */
function product_exists($code)
{
    $check_product = db_num_rows("SELECT * FROM `tbl_products` WHERE `code` = '{$code}' ");
    if($check_product > 0) return true;
    return false;
}

function add_product($data)
{
    return db_insert('tbl_products',$data);
}

function get_cat_id_by_brand($brand_id)
{
    $result = db_fetch_row("SELECT `cat_id` FROM `tbl_brands` WHERE `brand_id` = {$brand_id}") ;
    return $result['cat_id'];
}
/* addproductAction */
function update_product($code, $data)
{
    db_update("tbl_products",$data,"`code` = '{$code}' ");
}

function get_product_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `code` = '{$id}' ") ;
}
/* updateproductAction */
function delete_product($code, $url)
    {
        db_delete("tbl_products","`code` = '{$code}' ");
        if(isset($url))
        {
            @unlink($url);
        }
        redirect("?mod=products&controller=product&action=productIndex");
    }
/* deleteproductAction */
function cat_exists($content)
{
    $check_cat = db_num_rows("SELECT * FROM `tbl_cats` WHERE `content` = '{$content}' ");
    if($check_cat > 0) return true;
    return false;
}

function add_cat($data)
{
    return db_insert('tbl_cats',$data);
}
/* addCatAction */
function update_cat($id, $data)
{
    db_update("tbl_cats",$data,"`cat_id` = {$id}");
}

function get_cat_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_cats` WHERE `cat_id` = {$id}") ;
}
/* updateCatAction */
function delete_cat($id)
    {
        db_delete("tbl_cats","`cat_id` = {$id}");
        redirect("?mod=products&controller=cat&action=catIndex");
    }
/* deleteCatAction */
function get_cat_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_cats` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_num_cat()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_cats`");
    return $num_row;
}
/* catindexAction */
function brand_exists($content,$cat_id)
{
    $check_brand = db_num_rows("SELECT * FROM `tbl_brands` WHERE `content` = '{$content}' AND `cat_id` = {$cat_id} ");
    if($check_brand > 0) return true;
    return false;
}

function add_brand($data)
{
    return db_insert('tbl_brands',$data);
}
/* addbrandAction */
function update_brand($id, $data)
{
    db_update("tbl_brands",$data,"`brand_id` = {$id}");
}

function get_brand_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_brands` WHERE `brand_id` = {$id}") ;
}
/* updatebrandAction */
function delete_brand($id)
    {
        db_delete("tbl_brands","`brand_id` = {$id}");
        redirect("?mod=products&controller=brand&action=brandIndex");
    }
/* deletebrandAction */
function get_brand_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_brands` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}
function get_brand_dropdown()
{
    $result = db_fetch_array("SELECT * FROM `tbl_brands` ");
    return $result;
}
function get_num_brand()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_brands`");
    return $num_row;
}
/* brandindexAction */

