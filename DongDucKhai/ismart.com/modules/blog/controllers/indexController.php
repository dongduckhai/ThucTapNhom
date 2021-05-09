<?php
/* các action xử lý */
function construct() {
    load_model('index');
    load('lib','pagging');
}

function indexAction() 
{
    /* phần pagging */
    global $start;
    $num_per_page = 5;
    
    /* phần index */
    global $post_list;
    $post_list = get_post_list($start,$num_per_page);
    foreach($post_list as &$post)
    {   
        $post['detail_url'] = "?mod=blog&action=detailBlog&id={$post['post_id']}";
    }
    unset($post);
    load_view('blog');
}

function detailBlogAction()
{
    $post_id = (int)$_GET['id'];
    global $post_detail;
    $post_detail = get_post_detail_by_id($post_id);
    load_view('detailBlog');
}
