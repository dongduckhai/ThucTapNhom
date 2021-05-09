<?php

function get_cat_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_cats` WHERE `cat_id` = '{$id}' ");
}

function get_product_index_have_same_cat($cat)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = '{$cat}' ");
    return $result;
}

function get_product_total_have_same_cat($cat)
{
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `cat_id` = '{$cat}' ");
}



?>