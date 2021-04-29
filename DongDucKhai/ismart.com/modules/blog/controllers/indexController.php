<?php
/* các action xử lý */
function construct() {
//  đây là action dùng chung, load đầu tiên";
/*  gọi đến indexModal  */
/*  mấy hàm load này ở trong file core/base.php */
    load_model('index');
    load('lib','pagging');
}

function indexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_posts`");
    $num_per_page = 5;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
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
