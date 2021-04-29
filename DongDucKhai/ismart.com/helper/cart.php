<?php
function get_buy_list()
{
    if(isset($_SESSION['cart']['buy']))
    {
        return $_SESSION['cart']['buy'];
    }
    else
    {
        return false;
    }
}
/* function get_qty_per_item($id)
{
    return  $_SESSION['cart']['buy'][$id]['qty'];
} */
function get_info_cart()
{
    if(isset($_SESSION['cart']['info']))
    {
        return $_SESSION['cart']['info'];
    }
    else
    {
        return false;
    }
}
/* index */
?>