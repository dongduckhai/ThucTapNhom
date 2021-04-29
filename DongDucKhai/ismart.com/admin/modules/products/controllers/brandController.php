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

function brandIndexAction() 
{
    global $start, $num_page, $page, $brand_list, $sort;
    
    /* sắp xếp */
    if(isset($_GET['sort']) && $_GET['sort'] != NULL)
    {        
        $sort = $_GET['sort'];    
    }
    else
    {
        $sort = 1;  
    }
    $cat_list = get_cat_dropdown();
    foreach($cat_list as $cat)
    {
        if($cat['cat_id'] == $sort)
        {
            $where = " `cat_id` = {$cat['cat_id']} ";
            $num_row = db_num_rows("SELECT * FROM `tbl_brands` WHERE {$where}");
            $num_per_page = 8;
            $num_page = ceil($num_row / $num_per_page);
            /* chỉ số bản ghi mỗi trang */
            $page = isset($_GET['page'])? (int)$_GET['page']:1;
            /* Xuất phát từ phàn tử thứ */
            $start = ($page - 1) * $num_per_page;
        }
    }
    $brand_list = get_brand_list($start,$num_per_page,$where);
    foreach($brand_list as &$brand)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $brand['url_update'] = "?mod=products&controller=brand&action=updateBrand&id={$brand['brand_id']}" ;
        $brand['url_delete'] = "?mod=products&controller=brand&action=deleteBrand&id={$brand['brand_id']}" ;
    }
    unset($brand);
    load_view('brandIndex');
}

function addbrandAction()
{
    global $error, $content, $created_date, $cat_id, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống tên nhãn hàng*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if(empty($_POST["cat_id"])){
            $error["cat_id"] = "*Không để trống danh mục*";
        }
        else
        {
            $cat_id = $_POST["cat_id"] ;
        }
        if(empty($error))
        {
            if(!brand_exists($content,$cat_id))
            {
                $data = array(
                    'brand_id'=> NULL,
                    'cat_id'=> $cat_id,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                );
                add_brand($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['content'] = "Nhãn hàng đã tồn tại";
            }       
        }
    }
    load_view('addBrand');
}

function updateBrandAction()
{
    $brand_id = (int)$_GET['id'];
    global $error, $content, $created_date, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống tên nhãn hàng*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if(empty($_POST["cat_id"])){
            $error["cat_id"] = "*Không để trống danh mục*";
        }
        else
        {
            $cat_id = $_POST["cat_id"] ;
        }
        if(empty($error))
        {
            $data = array(
                'created_date'=> time(),
                'cat_id'=> $cat_id,
                'content'=> $content,
            );
            update_brand($brand_id, $data);
            $alert = "Cập nhật thành công";        
        }
    }
    global $brand_item;
    $brand_item = get_brand_item_by_id($brand_id);
    load_view('updateBrand');
}

function deleteBrandAction()
{
    $brand_id = (int)$_GET['id'];
    delete_brand($brand_id);
}

