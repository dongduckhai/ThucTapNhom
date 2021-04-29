<?php


function get_product_list_by_stt($stt)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `status` = '{$stt}' ");
    return $result;
}
/* sidebarHotProduct */
function get_post_list_by_stt($stt)
{
    $result = db_fetch_array("SELECT * FROM `tbl_posts` WHERE `status` = '{$stt}' ");
    return $result;
}
/* sidebarHotPost */
function get_slider_list_by_stt($stt)
{
    $result = db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `status` = '{$stt}' ");
    return $result;
}
/* carousei slider */
function get_cat_list()
{
    $result = db_fetch_array("SELECT * FROM `tbl_cats` ");
    return $result;
}

function get_brand_list_have_same_cat($cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_brands` WHERE `cat_id` = {$cat_id}");
    return $result;
}
/* sidebar */