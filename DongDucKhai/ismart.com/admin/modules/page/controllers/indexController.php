<?php
/* các action xử lý */
function construct() {
//  đây là action dùng chung, load đầu tiên";
/*  gọi đến indexModal  */
/*  mấy hàm load này ở trong file core/base.php */
    load_model('index');
    load('lib','validation');
    load('lib','pagging');
}

function indexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_pages`");
    $num_per_page = 8;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $page_list;
    $page_list = get_page_list($start,$num_per_page);
    foreach($page_list as &$page)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $page['url_update'] = "?mod=page&action=update&id={$page['page_id']}" ;
        $page['url_delete'] = "?mod=page&action=delete&id={$page['page_id']}" ;
    }
    unset($page);
    load_view('pageIndex');
}

function addPageAction()
{
    global $error, $page_title, $content, $created_date, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["page_title"])){
            $error["page_title"] = "*Không để trống tiêu đề*";
        }
        else
        {
            $page_title = $_POST["page_title"] ;
        }
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống nội dung*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        
        if(empty($error))
        {
            if(!title_exists($page_title))
            {
                $data = array(
                    'page_id'=> NULL,
                    'page_title'=> $page_title,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                );
                add_page($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['page_title'] = "Tiêu đề đã tồn tại";
            }       
        }
    }
    load_view('addPage');
}

function updateAction()
{
    $page_id = (int)$_GET['id'];
    global $error, $page_title, $content, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["page_title"])){
            $error["page_title"] = "*Không để trống tiêu đề*";
        }
        else
        {
            $page_title = $_POST["page_title"] ;
        }
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống nội dung*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        
        if(empty($error))
        {
            $data = array(
                'page_title' => $page_title,
                'content' => $content,
            );
            update_page($page_id, $data);           
            $alert = "Cập nhật thành công !"; 
        }
    }
    global $page_item;
    $page_item = get_page_item_by_id($page_id);
    load_view('updatePage');
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    delete_page($id);
}
