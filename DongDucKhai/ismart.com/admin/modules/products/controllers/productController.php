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

function productIndexAction() 
{
    global $start, $num_page, $page, $product_list, $sort;
    
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
            $num_row = db_num_rows("SELECT * FROM `tbl_products` WHERE {$where}");
            $num_per_page = 8;
            $num_page = ceil($num_row / $num_per_page);
            /* chỉ số bản ghi mỗi trang */
            $page = isset($_GET['page'])? (int)$_GET['page']:1;
            /* Xuất phát từ phàn tử thứ */
            $start = ($page - 1) * $num_per_page;
        }
    }
    $product_list = get_product_list($start,$num_per_page,$where);

    foreach($product_list as &$product)
    {
        /* cập nhật link sửa và xóa cho mỗi user */
        $product['url_update'] = "?mod=products&controller=product&action=updateProduct&id={$product['code']}" ;
        $product['url_delete'] = "?mod=products&controller=product&action=deleteProduct&id={$product['code']}" ;
    }
    unset($product);
    load_view('productIndex');
}

function addProductAction()
{
    global $error, $code, $thumb_url, $price, $product_name, $product_desc, $product_detail, $created_date, $brand_id, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_reg"]))
    {
        $error = array();
        if(empty($_POST["code"])){
            $error["code"] = "*Không để trống mã sản phẩm*";
        }
        else
        {
            $code = $_POST["code"] ;
        }
        if(empty($_POST["price"])){
            $error["price"] = "*Không để trống giá sản phẩm*";
        }
        else
        {
            $price = $_POST["price"] ;
        }
        if(empty($_POST["old_price"])){
            $old_price = NULL;
        }
        else
        {
            $old_price = $_POST["old_price"] ;
        }
        if(empty($_POST["product_name"])){
            $error["product_name"] = "*Không để trống tên sản phẩm*";
        }
        else
        {
            $product_name = $_POST["product_name"] ;
        }
        if(empty($_POST["product_desc"])){
            $error["product_desc"] = "*Không để trống mô tả sản phẩm*";
        }
        else
        {
            $product_desc = $_POST["product_desc"] ;
        }
        if(empty($_POST["product_detail"])){
            $error["product_detail"] = "*Không để trống chi tiết sản phẩm*";
        }
        else
        {
            $product_detail = $_POST["product_detail"] ;
        }
        if(empty($_POST["brand_id"])){
            $error["brand_id"] = "*Không để trống nhãn hàng*";
        }
        else
        {
            $brand_id = $_POST["brand_id"] ;
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
            if(!product_exists($code))
            {
                $data = array(
                    'code'=> $code,
                    'thumb_url'=> $thumb_url,
                    'price'=>$price,
                    'old_price'=>$old_price,
                    'product_name'=>$product_name,
                    'role'=> user_role(),
                    'product_desc'=> $product_desc,
                    'product_detail'=> $product_detail,
                    'created_date'=> time(),
                    'cat_id'=> get_cat_id_by_brand($brand_id),
                    'brand_id'=>$brand_id,
                );
                add_product($data);
                $alert = "Thêm mới thành công";  
            }   
            else
            {
                $error['code'] = "Mã sản phẩm đã tồn tại";
            }       
        }
    }
    load_view('addProduct');
}

function updateProductAction()
{
    $product_id = $_GET['id'];
    global $error, $thumb_url, $price, $old_price, $product_name, $product_desc, $product_detail, $created_date, $brand_id, $cat_id, $alert;
    /* phải cho global để truyền hàm xử lý sang View*/
    if(isset($_POST["btn_update"]))
    {
        $error = array();
        if(empty($_POST["price"])){
            $error["price"] = "*Không để trống giá sản phẩm*";
        }
        else
        {
            $price = $_POST["price"] ;
        }
        if(empty($_POST["old_price"])){
            $old_price = NULL;
        }
        else
        {
            $old_price = $_POST["old_price"] ;
        }
        if(empty($_POST["product_name"])){
            $error["product_name"] = "*Không để trống tên sản phẩm*";
        }
        else
        {
            $product_name = $_POST["product_name"] ;
        }
        if(empty($_POST["product_desc"])){
            $error["product_desc"] = "*Không để trống mô tả sản phẩm*";
        }
        else
        {
            $product_desc = $_POST["product_desc"] ;
        }
        if(empty($_POST["product_detail"])){
            $error["product_detail"] = "*Không để trống chi tiết sản phẩm*";
        }
        else
        {
            $product_detail = $_POST["product_detail"] ;
        }
        if(empty($_POST["brand_id"])){
            $error["brand_id"] = "*Không để trống nhãn hàng*";
        }
        else
        {
            $brand_id = $_POST["brand_id"] ;
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
                    'thumb_url'=> $thumb_url,
                    'price'=>$price,
                    'old_price'=> $old_price,
                    'product_name'=>$product_name,
                    'product_desc'=> $product_desc,
                    'product_detail'=> $product_detail,
                    'created_date'=> time(),
                    'cat_id'=> get_cat_id_by_brand($brand_id),
                    'brand_id'=>$brand_id,
                );
                update_product($product_id, $data);
                $alert = "Cập nhật thành công";     
            }             
        }
        else
        {
            if(empty($error))
            {
                $data = array(
                    'price'=>$price,
                    'old_price'=> $old_price,
                    'product_name'=>$product_name,
                    'product_desc'=> $product_desc,
                    'product_detail'=> $product_detail,
                    'created_date'=> time(),
                    'cat_id'=> get_cat_id_by_brand($brand_id),
                    'brand_id'=>$brand_id,
                );
                update_product($product_id, $data);
                $alert = "Cập nhật thành công";     
            }
        }
    }
    global $product_item;
    $product_item = get_product_item_by_id($product_id);
    load_view('updateProduct');
}

function deleteProductAction()
{
    $product_id = $_GET['id'];
    $product_item = get_product_item_by_id($product_id);
    $product_thumb_url = $product_item['thumb_url'];
    delete_product($product_id, $product_thumb_url);
}

