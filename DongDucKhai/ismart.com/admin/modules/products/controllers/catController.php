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

function catIndexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_cats`");
    $num_per_page = 8;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $cat_list;
    $cat_list = get_cat_list($start,$num_per_page);
    foreach($cat_list as &$cat)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $cat['url_update'] = "?mod=products&controller=cat&action=updateCat&id={$cat['cat_id']}" ;
        $cat['url_delete'] = "?mod=products&controller=cat&action=deleteCat&id={$cat['cat_id']}" ;
    }
    unset($cat);
    load_view('catIndex');
}

function addCatAction()
{
    global $error, $content, $created_date, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống tên danh mục*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if(empty($error))
        {
            if(!cat_exists($content))
            {
                $data = array(
                    'cat_id'=> NULL,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                );
                add_cat($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['content'] = "Danh mục đã tồn tại";
            }       
        }
    }
    load_view('addCat');
}

function updateCatAction()
{
    $cat_id = (int)$_GET['id'];
    global $error, $content, $created_date, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống tên danh mục*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if(empty($error))
        {
            $data = array(
                'created_date'=> time(),
                'content'=> $content,
            );
            update_cat($cat_id, $data);
            $alert = "Cập nhật thành công";        
        }
    }
    global $cat_item;
    $cat_item = get_cat_item_by_id($cat_id);
    load_view('updateCat');
}

function deleteCatAction()
{
    $cat_id = (int)$_GET['id'];
    delete_cat($cat_id);
}

