<?php
    function get_page_by_id($page_id)
    {
        return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_id` = {$page_id} ");
    }
?>