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

function sliderIndexAction() 
{
    /* phần pagging */
    global $start, $num_page, $page;
    $num_row = db_num_rows("SELECT * FROM `tbl_sliders`");
    $num_per_page = 5;
    $num_page = ceil($num_row / $num_per_page);
    /* chỉ số bản ghi mỗi trang */
    $page = isset($_GET['page'])? (int)$_GET['page']:1;
    /* Xuất phát từ phàn tử thứ */
    $start = ($page - 1) * $num_per_page;
    
    /* phần index */
    global $slider_list;
    $slider_list = get_slider_list($start,$num_per_page);
    foreach($slider_list as &$slider)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $slider['url_update'] = "?mod=slider&action=updateSlider&id={$slider['slider_id']}" ;
        $slider['url_delete'] = "?mod=slider&action=deleteSlider&id={$slider['slider_id']}" ;
    }
    unset($slider);
    load_view('sliderIndex');
}

function addSliderAction()
{
    global $error, $slider_url, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["status"])){
            $error["status"] = "*Không để trống trạng thái*";
        }
        else
        {
            $status = $_POST["status"] ;
        }
        if($_FILES['uploadSlider']['name'] != NULL)
        {
            $upload_dir = "uploadFiles/";
            $fileUpload_name = $_FILES["uploadSlider"]["name"]; /* vd: img.jpg */
            $path_uploadFile = $upload_dir.$_FILES["uploadSlider"]["name"]; /* vd uploadFile/img.jpg đường dẫn lưu ảnh */
            $path_fileUpload = $_FILES['uploadSlider']["tmp_name"]; /* đường dẫn đến cái ảnh cần lấy */
            /* echo $upload_file; */
            $allow_type = array("png","jpg","gif");
            $type = pathinfo($fileUpload_name,PATHINFO_EXTENSION); // hàm lấy thông tin file TH này là đuôi file
            if(!in_array(strtolower($type),$allow_type))
            {
                $error["slider_url"] = "File up lên sai định dạng";
            /* kiểm tra định dạng */
            }
            else{
                $file_size = $_FILES["uploadSlider"]["size"];
                if($file_size > 29000000000)
                {
                    $error["slider_url"] = "File up lên quá lớn";
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
                        $slider_url = $path_uploadFile;
                    }
                    else{
                        $error['slider_url'] = "Upload không thành công";
                    }
                }    
            }              
        }
        else
        {
            $error['slider_url'] = "Không được để trống ảnh slider";
        }
        if(empty($error))
        {
            if(!slider_exists($slider_url))
            {
                $data = array(
                    'slider_id'=>NULL,
                    'role'=> user_role(),
                    'created_date'=> time(),
                    'slider_url'=> $slider_url,
                    'status'=>$status,
                );
                add_slider($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['slider_url'] = "Ảnh slider đã tồn tại";
            }       
        }
    }
    load_view('addSlider');
}

function updateSliderAction()
{
    $slider_id = (int)$_GET['id'];
    global $error, $slider_url, $status, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["status"])){
            $error["status"] = "*Không để trống trạng thái*";
        }
        else
        {
            $status = $_POST["status"] ;
        }
        if($_FILES['uploadSlider']['name'] != NULL)
        {
            $upload_dir = "uploadFiles/";
            $fileUpload_name = $_FILES["uploadSlider"]["name"]; /* vd: img.jpg */
            $path_uploadFile = $upload_dir.$_FILES["uploadSlider"]["name"]; /* vd uploadFile/img.jpg đường dẫn lưu ảnh */
            $path_fileUpload = $_FILES["uploadSlider"]["tmp_name"]; /* đường dẫn đến cái ảnh cần lấy */
            /* echo $upload_file; */
            $allow_type = array("png","jpg","gif");
            $type = pathinfo($fileUpload_name,PATHINFO_EXTENSION); // hàm lấy thông tin file TH này là đuôi file
            if(!in_array(strtolower($type),$allow_type))
            {
                $error["slider_url"] = "File up lên sai định dạng";
            /* kiểm tra định dạng */
            }
            else{
                $file_size = $_FILES["uploadSlider"]["size"];
                if($file_size > 29000000000)
                {
                    $error["slider_url"] = "File up lên quá lớn";
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
                        $slider_url = $path_uploadFile;
                    }
                    else{
                        $error['slider_url'] = "Upload không thành công";
                    }
                }    
            } 
            if(empty($error))
            {
                $data = array(
                    'created_date'=> time(),
                    'slider_url'=> $slider_url,
                    'status'=>$status,
                );
                update_slider($slider_id, $data);
                $alert = "Cập nhật thành công";     
            }
        }
        else
        {
            if(empty($error))
            {
                $data = array(
                    'created_date'=> time(),
                    'status'=>$status,
                );
                update_slider($slider_id, $data);
                $alert = "Cập nhật thành công";     
            }
        }        
    }
    global $slider_item;
    $slider_item = get_slider_item_by_id($slider_id);
    load_view('updateSlider');
}

function deleteSliderAction()
{
    $slider_id = (int)$_GET['id'];
    delete_slider($slider_id);
}
