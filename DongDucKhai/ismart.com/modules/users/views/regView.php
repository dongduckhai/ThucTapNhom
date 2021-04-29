<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="public/css/bootstrap/bootstrap.minn.css" rel="stylesheet">
  <link href="public/css/reset.css" rel="stylesheet">
  <title>Đăng Ký</title>
</head>
<body>
    <style>
        body{
            background: url(public/images/pic4.jpg);
        }
    </style>

<div id="content">
<div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto my-2 bg-light rounded">
            <h2 class="text-center">Đăng Ký</h3>
            <form action="" method="POST">
                <div class="form-group" style="height:90px">
                    <label for="fullname">Họ và Tên</label>
                    <input type="text" name="fullname" id="name" value="<?php echo set_value('fullname') ?>"
                    autocomplete="off" class="form-control">
                        <?php echo form_error('fullname')?>
                        <!-- nhớ echo k thì nó k hiện ra đâu -->
                </div>
                <div class="form-group" style="height:90px">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone_number" id="phone" value="<?php echo set_value('phone_number') ?>"
                    autocomplete="off" class="form-control">
                        <?php echo form_error('phone_number')?>
                </div>
                <div class="form-group" style="height:90px">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>"
                    autocomplete="off" class="form-control">
                        <?php echo form_error('email')?>
                </div>
                <div class="form-group" style="height:90px">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>"
                    autocomplete="off" class="form-control">
                        <?php echo form_error('username')?>
                </div>
                <div class="form-group" style="height:90px">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" value=""
                    id="password" class="form-control">
                        <?php echo form_error('password')?>
                </div>
                <div class="form-group" style="height:90px">
                    <input type="submit" class="btn btn-success mt-1" style="width:100%" name="btn_reg" value ="Đăng Ký">
                    <?php echo form_error('account')?>
                    <?php if(isset($_POST["btn_reg"])) echo alert_success()?>
                </div>
            </form>
            <span>Đã có tài khoản ?</span><a href="?mod=users&action=login" id="lost-pass"> Đăng Nhập</a>
          </div>
        </div>
    </div>
</div>
</body>