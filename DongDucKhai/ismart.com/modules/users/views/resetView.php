<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="public/css/bootstrap/css/bootstrap.minn.css" rel="stylesheet">
  <link href="public/css/reset.css" rel="stylesheet">
  <title>Mật khẩu</title>
</head>

<body>
    <style>
        body{
            background: url(public/images/pic4.jpg);
        }
    </style>
    <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto mt-3 bg-white p-3 rounded">
            <form action="" method="POST">
            <h2 class="text-center">Khôi phục mật khẩu</h2>
            <p class='fst-italic'>*Chúng tôi sẽ gửi mã xác nhận đến email bạn đã đăng ký*</p>
                <div class="form-group" style="height:67px">
                <input type="text" name="email" id="user" autocomplete="off" class="form-control bg-light" placeholder="Email...." >
                <?php echo form_error("email")?>
                </div>
                <div class="form-group" style="height:67px">
                    <input type="submit" class="btn btn-success" style="width:100%" name="btn_reset" value ="Gửi yêu cầu">
                <?php echo form_error('account')?>
                <?php if(isset($_POST["btn_reset"])) echo alert_success()?>
                </div>
            </form>
            <a href="?mod=users&action=login">Đăng nhập</a> | <a href="?mod=users&action=reg">Đăng ký</a>
          </div>
        </div>
    </div>
</body>
<?php
get_footer();
?>