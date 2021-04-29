<?php
get_header();
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart&controller=cart" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php 
            $cart_info = get_info_cart();
            if($cart_info != false && $cart_info['total'] != 0 )
            {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    global $buy_list;
                    foreach($buy_list as $item)
                    {
                    ?>
                        <tr>
                            <td>
                                <?php echo $item['code']?>
                            </td>
                            <td>
                                <a href="<?php echo $item['code']?>" title="" class="thumb">
                                    <img src="admin/<?php echo $item['thumb_url']?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="?mod=products&controller=product&action=productDetail&id=<?php echo $item['code']?>"
                                    title="" class="name-product">
                                    <?php echo $item['product_name']?>
                                </a>
                            </td>
                            <td>
                                <?php echo currency_format($item['price']) ?>
                            </td>
                            <td>
                                <input type="number" min="1" max="10" name="qty[<?php echo $item['code'] ?>]"
                                    data-id="<?php echo $item['code'] ?>" value="<?php echo $item['qty'] ?>"
                                    class="num-order">
                                <!-- gán tên theo id cho phần input number để xử lý -->
                            </td>
                            <td id='sub-total-<?php echo $item[' code']?>'>
                                <?php echo currency_format($item['sub_total']) ?>
                            </td>
                            <td>
                                <a href="?mod=cart&controller=cart&action=deleteCart&id=<?php echo $item['code']?>"
                                    title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>
                                            <?php echo currency_format($cart_info['total']) ?>
                                        </span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?mod=cart&controller=checkOut" title="" id="checkout-cart">Thanh
                                            toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php
            }
            else
            {
            ?>
                <h2>Không còn sản phẩm nào trong giỏ hàng</h2>
                <img src="public/images/search_not_found.png" alt="">
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>