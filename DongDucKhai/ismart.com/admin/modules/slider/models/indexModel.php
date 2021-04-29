<?php
function get_slider_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_sliders` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_num_slider()
{
    return db_num_rows("SELECT * FROM `tbl_sliders`");
}
/* indexSlider */
function slider_exists($url)
{
    $check_slider = db_num_rows("SELECT * FROM `tbl_sliders` WHERE `slider_url` = '{$url}' ");
    if($check_slider > 0) return true;
    return false;
}

function add_slider($data)
{
    return db_insert('tbl_sliders',$data);
}
/* addsliderAction */
function update_slider($id, $data)
{
    db_update("tbl_sliders",$data,"`slider_id` = {$id}");
}

function get_slider_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `slider_id` = {$id}") ;
}
/* updatesliderAction */
function delete_slider($id)
    {
        db_delete("tbl_sliders","`slider_id` = {$id}");
        redirect("?mod=slider&action=sliderIndex");
    }
/* deletesliderAction */
?>