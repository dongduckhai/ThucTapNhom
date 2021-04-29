<?php
    function get_page_list($start,$num_per_page,$where = "")
    {
        if(!empty($where)){
            $where = "WHERE {$where}";
        }
        $list = db_fetch_array("SELECT * FROM `tbl_pages` {$where} LIMIT {$start},{$num_per_page}");
        return $list;
    }

    function get_num_page()
    {
        $num_row = db_num_rows("SELECT * FROM `tbl_pages`");
        return $num_row;
    }
    /* pageIndexAction */
    function title_exists($page_title)
    {
        $check_title = db_num_rows("SELECT * FROM `tbl_pages` WHERE `page_title` = '{$page_title}' ");
        if($check_title > 0) return true;
        return false;
    }

    function add_Page($data)
    {
        return db_insert('tbl_pages',$data);
    }
    /* addPageAction */
    function update_page($id, $data)
    {
        db_update("tbl_pages",$data,"`page_id` = {$id}");
    }

    function get_page_item_by_id($id)
    {
        return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_id` = {$id}") ;
    }
    /* updatePageAction */
    function delete_page($id)
    {
        db_delete("tbl_pages","`page_id` = {$id}");
        redirect("?mod=page&action=index");
    }
    /* deleteAction */
?>