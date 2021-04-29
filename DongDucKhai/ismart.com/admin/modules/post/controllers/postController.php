<?php
/* các action xử lý */
function construct() {
//  đây là action dùng chung, load đầu tiên";
/*  gọi đến indexModal  */
/*  mấy hàm load này ở trong file core/base.php */
    load_model('index');
    load('lib','validation');
    load('lib','pagging');
}

function postIndexAction() 
{
    global $start, $num_page, $page, $post_list, $sort;
    
    /* sắp xếp */
    if(isset($_GET['sort']) && $_GET['sort'] != NULL)
    {        
        $sort = $_GET['sort'];    
    }
    else
    {
        $sort = 1;  
    }
    $cat_list = get_cat_dropdown();
    foreach($cat_list as $cat)
    {
        if($cat['cat_id'] == $sort)
        {
            $where = " `cat_id` = {$cat['cat_id']} ";
            $num_row = db_num_rows("SELECT * FROM `tbl_posts` WHERE {$where}");
            $num_per_page = 8;
            $num_page = ceil($num_row / $num_per_page);
            /* chỉ số bản ghi mỗi trang */
            $page = isset($_GET['page'])? (int)$_GET['page']:1;
            /* Xuất phát từ phàn tử thứ */
            $start = ($page - 1) * $num_per_page;
        }
    }
    $post_list = get_post_list($start,$num_per_page,$where);
    foreach($post_list as &$post)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $post['url_update'] = "?mod=post&controller=post&action=updatePost&id={$post['post_id']}" ;
        $post['url_delete'] = "?mod=post&controller=post&action=deletePost&id={$post['post_id']}" ;
    }
    unset($post);
    
    load_view('postIndex');
}

function addPostAction()
{
    global $error, $post_title, $cat_id, $post_desc, $status, $content, $created_date, $thumb_url, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["post_title"])){
            $error["post_title"] = "*Không để trống tiêu đề*";
        }
        else
        {
            $post_title = $_POST["post_title"] ;
        }
        if(empty($_POST["cat_id"])){
            $error["cat_id"] = "*Không để trống danh mục*";
        }
        else
        {
            $cat_id = $_POST["cat_id"] ;
        }
        if(empty($_POST["post_desc"])){
            $error["post_desc"] = "*Không để trống mô tả*";
        }
        else
        {
            $post_desc = $_POST["post_desc"] ;
        }
        if(empty($_POST["status"])){
            $error["status"] = "*Không để trống nội dung*";
        }
        else
        {
            $status = $_POST["status"] ;
        }
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống nội dung*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if($_FILES['uploadFile']['name'] != NULL)
        {
            $upload_dir = "uploadFiles/";
            $fileUpload_name = $_FILES["uploadFile"]["name"]; /* vd: img.jpg */
            $path_uploadFile = $upload_dir.$_FILES["uploadFile"]["name"]; /* vd uploadFile/img.jpg đường dẫn lưu ảnh */
            $path_fileUpload = $_FILES["uploadFile"]["tmp_name"]; /* đường dẫn đến cái ảnh cần lấy */
            /* echo $upload_file; */
            $allow_type = array("png","jpg","gif");
            $type = pathinfo($fileUpload_name,PATHINFO_EXTENSION); // hàm lấy thông tin file TH này là đuôi file
            if(!in_array(strtolower($type),$allow_type))
            {
                $error["thumb_url"] = "File up lên sai định dạng";
            /* kiểm tra định dạng */
            }
            else{
                $file_size = $_FILES["uploadFile"]["size"];
                if($file_size > 29000000000)
                {
                    $error["thumb_url"] = "File up lên quá lớn";
                    /* kiểm tra kích thước */
                }
                else
                {  
                    if(file_exists($path_uploadFile)){
                        $file_name = pathinfo($fileUpload_name,PATHINFO_FILENAME);
                        $new_file_name = $file_name."-Copy.";
                        $new_upload_file = $upload_dir.$new_file_name.$type;
                        while(file_exists($new_upload_file)){
                            $k = 1;
                            $new_file_name = $file_name."-Copy({$k}).";
                            $k++;
                            $new_upload_file = $upload_dir.$new_file_name.$type;
                        }
                        $path_uploadFile = $new_upload_file;
                        /* tạo tên mới cho file bị trùng tên */
                    }
                    if(move_uploaded_file($path_fileUpload,$path_uploadFile))
                    {
                        $thumb_url = $path_uploadFile;
                    }
                    else{
                        $error['thumb_url'] = "Upload không thành công";
                    }
                }    
            }              
        }
        else
        {
            $error['thumb_url'] = "Không được để trống ảnh tiêu đề";
        }
        if(empty($error))
        {
            if(!post_exists($post_title, $cat_id))
            {
                $data = array(
                    'post_id'=> NULL,
                    'post_title'=> $post_title,
                    'cat_id'=>$cat_id,
                    'post_desc'=>$post_desc,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                    'thumb_url'=> $thumb_url,
                    'status'=> $status,
                );
                add_post($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['post_title'] = "Tiêu đề đã tồn tại";
            }       
        }
    }
    load_view('addPost');
}

function updatePostAction()
{
    $post_id = (int)$_GET['id'];
    global $error, $post_title, $cat_id, $post_desc, $status, $content, $created_date, $thumb_url, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["post_title"])){
            $error["post_title"] = "*Không để trống tiêu đề*";
        }
        else
        {
            $post_title = $_POST["post_title"] ;
        }
        if(empty($_POST["cat_id"])){
            $error["cat_id"] = "*Không để trống danh mục*";
        }
        else
        {
            $cat_id = $_POST["cat_id"] ;
        }
        if(empty($_POST["status"])){
            $error["status"] = "*Không để trống nội dung*";
        }
        else
        {
            $status = $_POST["status"] ;
        }
        if(empty($_POST["post_desc"])){
            $error["post_desc"] = "*Không để trống mô tả*";
        }
        else
        {
            $post_desc = $_POST["post_desc"] ;
        }
        if(empty($_POST["content"])){
            $error["content"] = "*Không để trống nội dung*";
        }
        else
        {
            $content = $_POST["content"] ;
        }
        if($_FILES['uploadFile']['name'] != NULL)
        {
            $upload_dir = "uploadFiles/";
            $fileUpload_name = $_FILES["uploadFile"]["name"]; /* vd: img.jpg */
            $path_uploadFile = $upload_dir.$_FILES["uploadFile"]["name"]; /* vd uploadFile/img.jpg đường dẫn lưu ảnh */
            $path_fileUpload = $_FILES["uploadFile"]["tmp_name"]; /* đường dẫn đến cái ảnh cần lấy */
            /* echo $upload_file; */
            $allow_type = array("png","jpg","gif");
            $type = pathinfo($fileUpload_name,PATHINFO_EXTENSION); // hàm lấy thông tin file TH này là đuôi file
            if(!in_array(strtolower($type),$allow_type))
            {
                $error["thumb_url"] = "File up lên sai định dạng";
            /* kiểm tra định dạng */
            }
            else{
                $file_size = $_FILES["uploadFile"]["size"];
                if($file_size > 29000000000)
                {
                    $error["thumb_url"] = "File up lên quá lớn";
                    /* kiểm tra kích thước */
                }
                else
                {  
                    if(file_exists($path_uploadFile)){
                        $file_name = pathinfo($fileUpload_name,PATHINFO_FILENAME);
                        $new_file_name = $file_name."-Copy.";
                        $new_upload_file = $upload_dir.$new_file_name.$type;
                        while(file_exists($new_upload_file)){
                            $k = 1;
                            $new_file_name = $file_name."-Copy({$k}).";
                            $k++;
                            $new_upload_file = $upload_dir.$new_file_name.$type;
                        }
                        $path_uploadFile = $new_upload_file;
                        /* tạo tên mới cho file bị trùng tên */
                    }
                    if(move_uploaded_file($path_fileUpload,$path_uploadFile))
                    {
                        $thumb_url = $path_uploadFile;
                    }
                    else{
                        $error['thumb_url'] = "Upload không thành công";
                    }
                }    
            } 
            if(empty($error))
            {
                $data = array(
                    'post_title'=> $post_title,
                    'cat_id'=> $cat_id,
                    'post_desc'=> $post_desc,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                    'thumb_url'=> $thumb_url,
                    'status'=> $status,
                );
                update_post($post_id, $data);
                $alert = "Cập nhật thành công";     
            }
        }
        else
        {
            if(empty($error))
            {
                $data = array(
                    'post_title'=> $post_title,
                    'cat_id'=>$cat_id,
                    'post_desc'=>$post_desc,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'content'=> $content,
                    'status'=> $status,
                );
                update_post($post_id, $data);
                $alert = "Cập nhật thành công";     
            }
        }        
    }
    global $post_item;
    $post_item = get_post_item_by_id($post_id);
    load_view('updatePost');
}

function deletePostAction()
{
    $post_id = (int)$_GET['id'];
    $post_item = get_post_item_by_id($post_id);
    $post_thumb_url = $post_item['thumb_url'];
    delete_post($post_id, $post_thumb_url);
}

