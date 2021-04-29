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
    global $hot_product_list;
    $hot_product_list = get_product_list_by_stt('2');
    foreach($hot_product_list as &$hot_product)
    {
        $hot_product['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$hot_product['code']}";
        $hot_product['url_addCart'] = "?mod=cart&controller=cart&action=addCart&id={$hot_product['code']}";
    }
    unset($hot_product);
    load_view('homeProduct');
}

function index2Action()
{
    global $brand_list, $cat_content;
    $cat_id = $_GET['id'];
    $brand_list = get_brand_list_have_same_cat($cat_id);
    $cat_content = get_cat_content_by_cat_id($cat_id);
    load_view('homeProduct2');
}
