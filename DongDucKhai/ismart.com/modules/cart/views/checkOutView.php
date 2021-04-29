<?php
get_header();
if(!is_login())
{
    redirect("?mod=users&action=login");
}
global $customer;
?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart&controller=checkOut" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="" name="form-checkout">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" autocomplete="off"
                                value="<?php echo $customer['fullname']?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" autocomplete="off"
                                value="<?php echo $customer['email']?>">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" autocomplete="off"
                                value="<?php echo set_value('address')?>">
                            <?php echo form_error('address')?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone_number">Số điện thoại</label>
                            <input type="tel" name="phone_number" id="phone" autocomplete="off"
                                value="<?php echo $customer['phone_number']?> ">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"><?php echo set_value('note')?></textarea>
                            <?php echo form_error('note')?>
                        </div>
                    </div>
                </div>
            </div>
            <?php              
            if(isset($_SESSION['cart']))
            {
            ?>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        global $buy_list, $cart_info;
                        foreach($buy_list as $item)
                        {
                    ?>
                            <tr class="cart-item">
                                <td class="product-name">
                                    <?php echo $item['product_name']?><strong class="product-quantity">x
                                        <?php echo $item['qty']?>
                                    </strong>
                                </td>
                                <td class="product-total">
                                    <?php echo currency_format($item['sub_total']) ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">
                                        <?php echo currency_format($cart_info['total']) ?>
                                    </strong></td>
                            </tr>
                        </tfoot>
                    
                    </table>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment" value="1">
                                <label for="direct-payment">Chuyển khoản ngân hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment" value="2">
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                            <?php echo form_error('payment')?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            }
            else
            {
            ?>
                <h2>Không còn sản phẩm nào trong giỏ hàng</h2>
                <img src="public/images/search_not_found.png" alt="">
                <?php if(isset($_POST['btn_order'])) echo alert_success()?>
            <?php
            }
            ?>
            <div class="place-order-wp clearfix">
                <input type="submit" id="order-now" name="btn_order" value="Đặt hàng">
            </div>
        </form>
    </div>
</div>
<?php
get_footer();
?>