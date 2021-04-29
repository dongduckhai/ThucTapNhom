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
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        global $search_product_list;
        $where = " `product_name` LIKE '%{$search}%' ";
        $search_product_list = get_search_product_list($start,$num_per_page,$where);
        foreach($search_product_list as &$product)
        {
            /* cập nhật link sửa và xóa cho mỗi user */
            $product['url_addCart'] = "?mod=cartcontroller=cart&action=addCart&id={$product['code']}";
            $product['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$product['code']}";
        }
        unset($product);
        load_view('searchResult');
    }
    else
    {
        redirect("?mod=home");
    }
}
