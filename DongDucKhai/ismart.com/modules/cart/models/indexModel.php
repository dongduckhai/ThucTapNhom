<?php
function get_product_item_by_id($id)
{
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `code` = '{$id}' ");
}

function add_cart($id)
{
    $item = get_product_item_by_id($id);
    $qty = 1;
    /* gán số lượng sản phẩm ban đầu = 1 */
    if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']['buy'])){
    /* kiểm tra loại sản phẩm này đã có trong giỏ hàng chưa nếu có thì só lượng mới = số lượng cũ + 1  */
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        /* thêm 1 sản phẩm với id = $id vầo mảng $_SESSION['cart']['buy'] hay chính là giỏ hàng */
        'code'=> $item['code'],
        'thumb_url'=>$item['thumb_url'],
        'product_name'=> $item['product_name'],
        'price'=> $item['price'],
        'qty'=> $qty,
        'sub_total'=> $qty * $item['price']
    );
}

function update_info_cart()
{
    if(isset($_SESSION['cart']))
    {
    /* lấy thông tin toàn bộ giỏ hàng */
        $number_order = 0;
        $total = 0;
        foreach($_SESSION['cart']['buy'] as $product)
        {
            $number_order += $product['qty'];
            $total += $product['sub_total'];
        }
        $_SESSION['cart']['info'] = array(
        'num_order'=> $number_order,
        'total'=> $total,
        );  
    }
}
/* addCart */

function delete_cart($id)
{
    if(isset($_SESSION['cart']))
        {
            /* xóa sản phẩm nếu có id */
            if($id != -1){
                unset($_SESSION['cart']['buy'][$id]);
                update_info_cart();
            }
            else{
                unset($_SESSION['cart']);
            }
        }
}
/* deleteCart */
function add_order($data)
{
    return db_insert('tbl_orders',$data);
}
/* addOrder */
?>