<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" style="margin-left:25px;" class="fl-left">Thông tin</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo info_user('fullname')?>">
                        <?php echo form_error('fullname')?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="admin" readonly="readonly" value="<?php echo info_user('username')?>">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo info_user('email')?>">
                        <?php echo form_error('email')?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="phone" value="<?php echo info_user('phone_number')?>">
                        <?php echo form_error('phone_number')?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo info_user('address')?></textarea>
                        <?php echo form_error('address')?>
                        <button type="submit" name="btn_update" id="btn_update">Cập nhật</button>
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