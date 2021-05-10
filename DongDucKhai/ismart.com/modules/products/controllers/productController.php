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
    global $brand_item, $brand_content, $cat_content, $product_list, $start, $num_page, $page;
    $brand_id = (int)$_GET['id'];
    /* pagging */
    $num_row = db_num_rows("SELECT * FROM `tbl_products` WHERE `brand_id` = {$brand_id} ");
    $num_per_page = 8;
    $num_page = ceil($num_row / $num_per_page);
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    $start = ($page - 1) * $num_per_page;
    $where = " `brand_id` = {$brand_id}";
    /* productIndex */
    if(isset($_POST['btn_sort']))
    {
        $sort = $_POST['sort'];
        $order_by="";
        switch($sort)
        {
            case 1: 
                $order_by = " `product_name` ASC ";
                break;
            case 2:
                $order_by = " `price` ASC ";
                break;
            case 3:
                $order_by = " `price` DESC ";
                break;
        }
        $product_list = get_product_list_have_same_brand($start,$num_per_page,$where,$order_by);
    }
    else
    {
        $product_list = get_product_list_have_same_brand($start,$num_per_page,$where);
    }
    /* sắp xếp */
    foreach($product_list as &$product)
    {
        $product['url_addCart'] = "?mod=cart&controller=cart&action=addCart&id={$product['code']}";
        $product['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$product['code']}";
    }
    unset($product);
    /* lấy thông tin brand */
    $brand_item = get_brand_item_by_id($brand_id);
    /* lấy tên danh mục để gán lên thanh breadcrumb */
    $cat_content = get_cat_content_by_brand($brand_item['cat_id']);
    load_view('productIndex');
}

function productDetailAction()
{
    $product_id = $_GET['id'];
    global $product_item, $product_item_cat;
    $product_item = get_product_item_by_id($product_id);
    $cat_id = $product_item['cat_id'];
    $product_item_cat = get_cat_content_by_cat_id($cat_id);
    global $same_brand_product_list;
    $same_brand_product_list = get_product_slide_have_same_brand($product_item['brand_id']);
    /* Product detail */
    foreach($same_brand_product_list as &$same_product)
    {
        $same_product['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$same_product['code']}";
        $same_product['url_addCart'] = "?mod=cart&controller=cart&action=addCart&id={$same_product['code']}";
    }
    unset($same_product);
    /* sameBrandProduct */
    load_view('productDetail');
}



