<?php
get_header();
global $order_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chi tiết đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="fullname">Tên khách hàng</label>
                        <input type="text" name="fullname" id="fullname" readonly value="<?php echo $order_item['fullname'] ?>">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" readonly value="<?php echo $order_item['email'] ?>">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number" readonly value="<?php echo $order_item['phone_number'] ?>">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" readonly value="<?php echo $order_item['address'] ?>">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" id="note" readonly><?php echo $order_item['note'] ?></textarea>
                        <label for="created_date">Ngày tháng</label>
                        <input type="text" name="created_date" id="created_date" readonly value="<?php echo date('d-m-Y', $order_item['created_date'])  ?>">
                        <label for="total">Tổng tiền</label>
                        <input type="text" name="total" id="total" readonly value="<?php echo currency_format($order_item['total'])  ?>">
                        <label>Phương thức thanh toán</label>
                        <select name="payment">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($order_item['payment']) && $order_item['payment'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1">Chuyển khoản ngân hàng</option>
                            <option
                            <?php
                                if(!empty($order_item['payment']) && $order_item['payment'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2">Thanh toán tại nhà</option>
                        </select>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1">Chưa giao hàng</option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2">Đang giao hàng</option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "3") echo"selected = 'selected';"
                            ?> 
                            value="3">Đã giao hàng xong</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>