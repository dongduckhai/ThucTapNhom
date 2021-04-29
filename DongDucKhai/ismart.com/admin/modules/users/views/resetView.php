<?php
get_header();
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" style="margin-left:25px;" class="fl-left">Đổi mật khẩu</h3>
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
                        <label for="old_pass">Mật khẩu cũ</label>
                        <input type="password" name="old_pass" id="old_pass">
                        <?php echo form_error('old_pass')?>
                        <label for="new_pass">Mật khẩu mới</label>
                        <input type="password" name="new_pass" id="new_pass">
                        <?php echo form_error('new_pass')?>
                        <label for="pass_confirm">Xác nhận mật khẩu</label>
                        <input type="password" name="pass_confirm" id="pass_confirm">
                        <?php echo form_error('pass_confirm')?>
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