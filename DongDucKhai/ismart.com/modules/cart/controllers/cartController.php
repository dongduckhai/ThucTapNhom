<?php
/* các action xử lý */
function construct() 
{
//  đây là action dùng chung, load đầu tiên";
/*  gọi đến indexModal  */
/*  mấy hàm load này ở trong file core/base.php */
load_model('index');
load('lib','validation');
}

function indexAction()
{
    global $buy_list, $cart_info;
    $buy_list = get_buy_list();
    $cart_info = get_info_cart();
    load_view('cart');
}

function addCartAction()
{
    $id = $_GET['id'];
    add_cart($id);
    update_info_cart();
    /* chuyển hướng */
    redirect("?mod=cart&controller=cart");
}

function deleteCartAction()
{
    $id = $_GET['id'];
    delete_cart($id);
    redirect("?mod=cart&controller=cart");
}

function updateCartAction()
{
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $item = get_product_item_by_id($id);
    if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']['buy'])){
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;
        $sub_total = $qty * $item['price'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
        update_info_cart();
        $cart_infor = get_info_cart();
        $total = $cart_infor['total'];
        $num_order = $cart_infor['num_order'];
        $data = array(
            'num_order'=> $num_order,
            'sub_total'=> currency_format($sub_total),
            'total'=> currency_format($total)
        );
        echo json_encode($data);
        /* dữ liệu đã xử lý xong */
    }
}