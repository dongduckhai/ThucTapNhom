<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="public/css/bootstrap/bootstrap.minn.css" rel="stylesheet">
  <link href="public/css/reset.css" rel="stylesheet">
  <title>Đăng Nhập</title>
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
            <h2 class="text-center">Đăng Nhập</h3>
                <div class="form-group" style="height:67px">
                    <input type="text" name="username" id="user" autocomplete="off" class="form-control bg-light" placeholder="Username..." >
                <?php echo form_error('username')?>
                </div>
                <div class="form-group" style="height:67px">
                    <input type="password" name="password" id="pass" class="form-control bg-light" placeholder="Password...">
                <?php echo form_error('password')?>
                </div>
                <div class="form-group" style="height:67px">
                    <input type="submit" class="btn btn-success" style="width:100%" name="btn_login" value ="Đăng Nhập">
                <?php echo form_error('account')?>
                </div>
            </form>
          </div>
        </div>
    </div>
</body>