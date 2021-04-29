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

function customerIndexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_customers`");
    $num_per_page = 8;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $customer_list;
    $customer_list = get_customer_list($start,$num_per_page);
    foreach($customer_list as &$customer)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $customer['url_detail'] = "?mod=order&controller=customer&action=detailCustomer&id={$customer['cus_id']}" ;
    }
    unset($customer);
    load_view('customerIndex');
}

function detailCustomerAction()
{
    $cus_id = (int)$_GET['id'];
    /* phần pagging */
    global $start, $num_page, $page, $customer_item, $customer_order_list, $num_customer_order_list;
    $num_row = db_num_rows("SELECT * FROM `tbl_orders` WHERE `cus_id` = '{$cus_id}'");
    $num_per_page = 5;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần detail và indexCusOrder */
    $customer_item = get_customer_item_by_id($cus_id);
    $where = "`cus_id` = {$cus_id}";
    $customer_order_list = get_order_list_by_cus_id($start,$num_per_page,$where);
    $num_customer_order_list = get_num_customer_order_list($cus_id);
    foreach($customer_order_list as &$order)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $order['url_update'] = "?mod=order&controller=order&action=updateOrder&id={$order['order_id']}" ;
        $order['url_delete'] = "?mod=order&controller=customer&action=deleteOrder&id={$order['order_id']}" ;
        $order['url_order_detail'] = "?mod=order&controller=order&action=orderDetail&id={$order['order_id']}";
    }
    unset($customer);
    load_view('customerDetail');
}

function deleteOrderAction()
{
    $id = (int)$_GET['id'];
    $order_item = get_order_item_by_id($id);
    $cus_id = $order_item['cus_id'];
    delete_order_per_customer($id, $cus_id);
}




