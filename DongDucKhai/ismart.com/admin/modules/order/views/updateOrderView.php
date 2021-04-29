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
                    <h3 id="index" class="fl-left">Cập nhật đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1">Chưa giao hàng
                            </option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2">Đang giao hàng
                            </option>
                            <option
                            <?php
                                if(!empty($order_item['status']) && $order_item['status'] == "3") echo"selected = 'selected';"
                            ?> 
                            value="3">Đã giao hàng xong
                            </option>
                        </select>
                        <?php echo form_error('status')?>
                        <label>Phương thức thanh toán</label>
                        <select name="payment">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($order_item['payment']) && $order_item['payment'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1">Tại cửa hàng
                            </option>
                            <option
                            <?php
                                if(!empty($order_item['payment']) && $order_item['payment'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2">Tại nhà
                            </option>
                        </select>
                        <?php echo form_error('payment')?>
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="<?php echo $order_item['address'] ?>">
                        <?php echo form_error('address')?>
                        <button style="margin: 20px 0px" type="submit" name="btn_update" id="btn_update">Cập nhật</button>
                        <?php if(isset($_POST['btn_update'])) echo alert_success()?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>