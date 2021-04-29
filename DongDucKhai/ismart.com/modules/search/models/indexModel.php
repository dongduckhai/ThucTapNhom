<?php
function get_search_product_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_products` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}
?>