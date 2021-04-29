<?php
function construct() {
    //  đây là action dùng chung, load đầu tiên";
    /*  gọi đến indexModal  */
    /*  mấy hàm load này ở trong file core/base.php */
        load_model('index');
        load('lib','validation');
        load('lib','email');
        load('lib','pagging');
    }
function teamIndexAction()
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_users`");
    $num_per_page = 5;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $user_list;
    $user_list = get_user_list($start,$num_per_page);
    load_view('teamIndex');
}

function addUserAction()
{
    global $error, $username, $password, $email, $phone_number, $fullname, $address, $role, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
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
            $password = $_POST["password"];  
        }
        if(empty($_POST["role"])){
            $error["role"] = "*Không để trống chức vụ*";
        }
        else
        {
            $role = $_POST["role"];  
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
            if(!user_exists($username, $email))
            {
                $data = array(
                    'user_id'=> NULL,
                    'username'=>$username,
                    'password'=> md5($password),
                    'fullname'=>$fullname,
                    'phone_number'=>$phone_number,
                    'email'=>$email,
                    'address'=>$address,
                    'created_date'=> time(),
                    'role'=> $role,    
                );
                add_user($data);
                $alert = "Thêm mới thành công";
            }
            else
            {
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại";   
            }         
            /* echo show_array($data); */
        }
    }
    load_view('addUser');
}
?>