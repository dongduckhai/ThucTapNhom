<?php
function get_post_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_posts` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}
/* index */
function get_post_detail_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}") ;
}
/* detail */
?>