<?php
/* các hàm làm việc với database */
function get_post_list($start,$num_per_page,$where = "")
{
    if(!empty($where)){
        $where = "WHERE {$where}";
    }
    $list = db_fetch_array("SELECT * FROM `tbl_posts` {$where} LIMIT {$start},{$num_per_page}");
    return $list;
}

function get_num_post()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_posts`");
    return $num_row;
}

function get_category_by_cat_id($id)
{
    $result = db_fetch_row("SELECT `content` FROM `tbl_cats` WHERE `cat_id` = {$id}") ;
    return $result['content'];
}

/* postIndexAction */
function post_exists($title, $cat_id)
{
    $check_title = db_num_rows("SELECT * FROM `tbl_posts` WHERE `post_title` = '{$title}' AND `cat_id` = '{$cat_id}' ");
    if($check_title > 0) return true;
    return false;
}

function add_post($data)
{
    return db_insert('tbl_posts',$data);
}
/* addPostAction */
function update_post($id, $data)
{
    db_update("tbl_posts",$data,"`post_id` = {$id}");
}

function get_post_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}") ;
}
/* updatePostAction */
function delete_post($id, $url)
    {
        db_delete("tbl_posts","`post_id` = {$id}");
        if(isset($url))
        {
            @unlink($url);
        }
        redirect("?mod=post&controller=post&action=postIndex");
    }
/* deletePostAction */
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
        redirect("?mod=post&controller=cat&action=catIndex");
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
function get_cat_dropdown()
{
    $result = db_fetch_array("SELECT * FROM `tbl_cats` ");
    return $result;
} 

function get_num_cat()
{
    $num_row = db_num_rows("SELECT * FROM `tbl_cats`");
    return $num_row;
}
/* catindexAction */

