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
    global $buy_list, $cart_info, $customer;
    $customer = info_customer();
    $buy_list = get_buy_list();
    $cart_info = get_info_cart();
    global $error, $address, $note, $payment, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_order"]))
    {
        $error = array();
        if(empty($_POST["address"])){
            $error['address'] = "*Không bỏ trống địa chỉ*";
        }
        else
        {
            $address = $_POST["address"];
        }
        if(empty($_POST["note"])){
            $note = NULL;
        }
        else
        {
            $note = $_POST["note"] ;
        }
        if(empty($_POST["payment"])){
            $error["payment"] = "*Chọn 1 trong 2 phương thức thanh toán*";
        }
        else
        {
            $payment = $_POST["payment"] ;
        }
        if(empty($error))
        {
            $total = $cart_info['total'];
            $data = array(
                'order_id'=> NULL,
                'cus_id'=> $customer['cus_id'],
                'fullname'=> $customer['fullname'],
                'email'=> $customer['email'],
                'phone_number'=>$customer['phone_number'],
                'address'=>$address,
                'note'=>$note,
                'status'=> 1,
                'payment'=>$payment,
                'created_date'=> time(),
                'total'=> $total,
                );
                add_order($data);
                $alert = "Đặt hàng thành công"; 
                unset($_SESSION['cart']);  
                
        }
    }
    load_view('checkOut');
}

