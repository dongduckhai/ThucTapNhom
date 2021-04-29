
<?php
/* các action xử lý */
function construct() {
//  đây là action dùng chung, load đầu tiên";
/*  gọi đến indexModal  */
/*  mấy hàm load này ở trong file core/base.php */
    load_model('index');
    load('lib','validation');
    load('lib','email');
}

function regAction() 
{
    global $error, $username, $password, $fullname, $email, $phone_number, $alert;
    /* echo send_mail('dongduckhai308@gmail.com', 'Đồng Đức Khải', 'Kích hoạt tài khoản', LINK); */
    if(isset($_POST["btn_reg"])){
        $error = array();
        /* Ktra lỗi thiếu thông tin đăng nhập */
        if(empty($_POST["username"])){
            $error["username"] = "*Không để trống tên đăng nhập*";
        }
        else
        {   
            $username = $_POST["username"]; 
        }
        if(empty($_POST["password"])){
            $error["password"] = "*Không để trống mật khẩu*";
        }
        else
        {
            $password = md5($_POST["password"]) ;
        }
        if(empty($_POST["fullname"])){
            $error["fullname"] = "*Không để trống họ và tên*";
        }
        else
        {
            $fullname = $_POST["fullname"];  
        }
        if(empty($_POST["email"])){
            $error["email"] = "*Không để trống email*";
        }
        else
        {
            if(!is_email($_POST['email']))
            {
                $error['email'] = "*Email không đúng định dạng*";
            }
            else{
                $email = $_POST["email"];  
            }
        }
        if(empty($_POST["phone_number"])){
            $error["phone_number"] = "*Không để trống số điện thoại*";
        }
        else
        {
            $phone_number = $_POST["phone_number"];
        }
        if(empty($error))
        {
            if(!customer_exists($username, $email)){
                $active_token = md5($username.time());
                $data = array(
                    'cus_id' => NULL,
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => $password,
                    'username' => $username,
                    'phone_number' => $phone_number,
                    'is_active'=> '0',
                    'active_token' => $active_token,
                    'reg_date' => time(),
                );
                add_customer($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào {$data['fullname']}</p>
                <p>Ismart vừa nhận được yêu cầu đăng ký tài khoản của bạn.Để xác nhận đăng ký 
                vui lòng click vào đường link bên dưới: <hr> {$link_active}</p>
                <p>Nếu không phải yêu cầu của bạn hãy bỏ qua email này</p>";
                send_mail($data['email'], $data['fullname'], 'Kích hoạt tài khoản', $content);
                delete_customer_outdate($data['reg_date']);
                $alert = "Vui lòng xác nhận email để hoàn tất đăng ký";
                /* redirect("?mod=users&action=login"); */
            }
            else{
                $error['account'] = "Email hoặc Tên đăng nhập đã tồn tại";
            }
        }
    }
    load_view('reg');
}
function loginAction()
{
    global $error, $username, $password ;
    if(isset($_POST["btn_login"])){
        $error = array();
        
        if(empty($_POST["username"])){
            $error["username"] = "*Không để trống tên đăng nhập*";
        }
        else
        {   
            $username = $_POST["username"]; 
        }
        if(empty($_POST["password"])){
            $error["password"] = "*Không để trống mật khẩu*";
        }
        else
        {
            $password = md5($_POST["password"]) ;
        }
        if(empty($error))
        {
            if(check_login($username, $password))
            {
                $_SESSION['cus_is_login'] = true;
                $_SESSION['cus_login'] = $username;
                redirect('?mod=cart&controller=checkOut');
            }
            else{
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }
        }
    }
    load_view('login');
}

function activeAction()
{
    $active_token = $_GET['active_token'];
    if(check_active_token($active_token))
    {
        active_customer($active_token);
        $link_login = base_url("?mod=users&action=login");
        echo "Kích hoạt thành công.<a href='{$link_login}'>Đăng Nhập</a>";

    }
    else
    {
        $link_login = base_url("?mod=users&action=login");
        echo"Tài khoản đã được kích hoạt hoặc Mã kích hoạt đã hết hiệu lực<a href='{$link_login}'>Đăng Nhập</a>";
    }
}
function resetAction()
{
    global $error, $email, $alert;
    if(isset($_POST["btn_reset"]))
    {
        $error = array();
        /* Ktra lỗi thiếu thông tin đăng nhập */
        if(empty($_POST["email"])){
            $error["email"] = "*Không được để trống email*";
        }
        else
        {
            if(!is_email($_POST['email']))
            {
                $error["email"] = "*Email không đúng định dạng*";
            }
            else{
                $email = $_POST["email"];  
            }
        }
        if(empty($error))
        {
            if(check_email($email))
            {
                $reset_token = md5($email.time());
                $data = array(
                    'reset_token'=> $reset_token,
                );
                /* update reset_token cho 1 user */
                update_reset_token($data, $email);
                /* gửi link lấy lại mật khẩu */
                $link_active = base_url("?mod=users&action=newPass&reset_token={$reset_token}");
                $content = "<p>Ismart vừa nhận được yêu cầu lấy lại mật khẩu của bạn.Để lấy lại
                mật khẩu vui lòng click vào đường link bên dưới: <hr> {$link_active}</p>
                <p>Nếu không phải yêu cầu của bạn hãy bỏ qua email này</p>";
                send_mail($email, '', 'Lấy lại mật khẩu', $content);
                $alert = "Đã gửi đến email của bạn";
            }
            else
            {
                $error['account'] = "Địa chỉ email chưa được đăng ký";
            }
        }

    }
    load_view('reset');
}

function newPassAction()
{
    global $error, $password, $alert;
    $reset_token = $_GET['reset_token'];
    if(check_reset_token($reset_token))
    {
        if(isset($_POST["btn_new_pass"]))
        {
            $error = array();
            if(empty($_POST["password"]))
            {
                $error["password"] = "*Không để trống mật khẩu*";
            }
            else
            {
                $password = md5($_POST["password"]) ;
            }
            if(empty($error))
            {
                $data = array(
                'password'=> $password,
                );
                update_password($data, $reset_token);
                $alert = "Đổi mật khẩu thành công";

            }
        }
        load_view('newPass');
    }
    else
    {
        $alert = "Mã đã hết hiệu lực";
    }
}


