<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" style="margin-left:25px;">Thêm mới tài khoản</h3>
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
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" autocomplete='off' value="<?php echo set_value('fullname') ?>">
                        <?php echo form_error('fullname')?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" value="<?php echo set_value('username') ?>">
                        <?php echo form_error('username')?>
                        <label for="password" value="">Mật khẩu</label>
                        <input type="password" name="password">
                        <?php echo form_error('password')?>
                        <label for="">Chức vụ</label>
                        <select name="role">
                        <option value="">... Chọn ...</option>
                        <option value="1" <?php echo set_value_select('role',1)?> >Quản lý</option>
                        <option value="2" <?php echo set_value_select('role',2)?> >Thư ký</option>                      
                        <option value="3" <?php echo set_value_select('role',3)?> >Cộng tác viên</option>
                        </select>
                        <?php echo form_error('role')?>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email')?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="phone" value="<?php echo set_value('phone_number') ?>">
                        <?php echo form_error('phone_number')?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo set_value('address') ?></textarea>
                        <?php echo form_error('address')?>
                        <button type="submit" name="btn_reg" id="btn_reg">Thêm mới</button>
                        <?php echo form_error('account')?>
                        <?php if(isset($_POST['btn_reg'])) echo alert_success()?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>