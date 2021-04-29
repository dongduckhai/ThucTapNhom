<?php
/* các action xử lý */
function construct() {
    //  đây là action dùng chung, load đầu tiên";
    /*  gọi đến indexModal  */
    /*  mấy hàm load này ở trong file core/base.php */
        load_model('index');
    }

function indexAction(){
    $id = (int)$_GET['id'];
    global $page;
    $page = get_page_by_id($id);
    load_view('index');
}

