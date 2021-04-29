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

function orderIndexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_orders`");
    $num_per_page = 8;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $order_list;
    $order_list = get_order_list($start,$num_per_page);
    foreach($order_list as &$order)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $order['url_update'] = "?mod=order&controller=order&action=updateOrder&id={$order['order_id']}" ;
        $order['url_delete'] = "?mod=order&controller=order&action=deleteOrder&id={$order['order_id']}" ;
        $order['url_cus_detail'] = "?mod=order&controller=customer&action=detailCustomer&id={$order['cus_id']}" ;
        $order['url_order_detail'] = "?mod=order&controller=order&action=orderDetail&id={$order['order_id']}" ;
    }
    unset($order);
    load_view('orderIndex');
}

function updateOrderAction()
{
    $order_id = (int)$_GET['id'];
    global $error, $status, $payment, $address, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["status"])){
            $error["status"] = "*Không để trống trạng thái*";
        }
        else
        {
            $status = $_POST["status"] ;
        }
        if(empty($_POST["payment"])){
            $error["payment"] = "*Không để trống phương thức thanh toán*";
        }
        else
        {
            $payment = $_POST["payment"] ;
        }
        if(empty($_POST["address"])){
            $error["address"] = "*Không để trống địa chỉ*";
        }
        else
        {
            $address = $_POST["address"] ;
        }
        if(empty($error))
        {
            $data = array(
                'address'=> $address,
                'status' => $status,
                'payment'=> $payment,
            );
            update_order($order_id, $data);           
            $alert = "Cập nhật thành công !"; 
        }
    }
    global $order_item;
    $order_item = get_order_item_by_id($order_id);
    load_view('updateOrder');
}

function deleteOrderAction()
{
    $id = (int)$_GET['id'];
    delete_order($id);
}

function orderDetailAction()
{
    $order_id = (int)$_GET['id'];
    global $order_item;
    $order_item = get_order_item_by_id($order_id);
    load_view('orderDetail');
}

