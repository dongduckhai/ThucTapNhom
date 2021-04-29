
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
    global $error, $username, $password, $email, $gender, $fullname, $alert;
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
        if(empty($_POST["gender"])){
            $error["gender"] = "*Không để trống giới tính*";
        }
        else
        {
            $gender = $_POST["gender"];
        }
        if(empty($error))
        {
            if(!user_exists($username, $email)){
                $active_token = md5($username.time());
                $data = array(
                    'user_id' => NULL,
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => $password,
                    'user_name' => $username,
                    'gender' => $gender,
                    'active_token' => $active_token,
                    'reg_date' => time(),
                );
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào {$data['fullname']}</p>
                <p>Unitop vừa nhận được yêu cầu đăng ký tài khoản của bạn.Để xác nhận đăng ký 
                vui lòng click vào đường link bên dưới: <hr> {$link_active}</p>
                <p>Nếu không phải yêu cầu của bạn hãy bỏ qua email này</p>";
                send_mail($data['email'], $data['fullname'], 'Kích hoạt tài khoản', $content);
                delete_user_outdate($data['reg_date']);
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
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect();
                /* k cần có tham số nó cũng tự chạy vào home */
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
        active_user($active_token);
        $link_login = base_url("?mod=users&action=login");
        echo "Kích hoạt thành công.<a href='{$link_login}'>Đăng Nhập</a>";

    }
    else
    {
        $link_login = base_url("?mod=users&action=login");
        echo"Tài khoản đã được kích hoạt hoặc Mã kích hoạt đã hết hiệu lực<a href='{$link_login}'>Đăng Nhập</a>";
    }
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

function resetAction()
{
    global $error, $old_pass, $new_pass, $pass_confirm, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["old_pass"])){
            $error["old_pass"] = "*Không để trống mật khẩu cũ*";
        }
        else
        {
            $old_pass = md5($_POST["old_pass"]);
            if(!check_old_pass(user_login(), $old_pass)){
                $error["old_pass"] = "*Mật khẩu cũ không đúng*";
            }
        }
        if(empty($_POST['new_pass'])|| empty($_POST['pass_confirm']))
        {
            $error["new_pass"] = "*Không để trống mật khẩu mới*";
            $error["pass_confirm"] = "*Cần xác nhận lại mật khẩu mới*";
        }
        else
        {
            $new_pass = md5($_POST["new_pass"]);
            $pass_confirm = md5($_POST["pass_confirm"]);
            if($new_pass != $pass_confirm)
            {
                $error['pass_confirm'] = "*Không trùng khớp*";
            }
        }
        if(empty($error))
        {
            $data = array(
                'password'=>$new_pass,
            );
            /* echo show_array($data); */
            update_user_login(user_login(), $data);
            $alert = "Đổi mật khẩu thành công";
        }
    }
   load_view('reset');
}

function updateAction()
{
    global $error, $username, $email, $phone_number, $fullname, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["phone_number"])){
            $error["phone_number"] = "*Không để trống số điện thoại*";
        }
        else
        {
            $phone_number = $_POST["phone_number"] ;
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
        if(empty($_POST["address"])){
            $error["address"] = "*Không để trống địa chỉ*";
        }
        else
        {
            $address = $_POST["address"];  
        }
        if(empty($error))
        {
            $data = array(
                'fullname'=>$fullname,
                'phone_number'=>$phone_number,
                'email'=>$email,
                'address'=>$address,
            );
            /* echo show_array($data); */
            update_user_login(user_login(), $data);
            $alert = "Cập nhật thành công";
        }
    }
    load_view('update');
}
