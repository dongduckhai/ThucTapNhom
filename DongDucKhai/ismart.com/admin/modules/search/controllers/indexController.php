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

function searchPageAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_page_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_pages` WHERE `page_title` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `page_title` LIKE '%{$search}%' ";
        $search_page_list = get_search_page_list($start,$num_per_page,$where);
        foreach($search_page_list as &$page_item)
        {
            /* cập nhật link sửa và xóa cho mỗi user */
            $page_item['url_update'] = "?mod=page&action=update&id={$page_item['page_id']}" ;
            $page_item['url_delete'] = "?mod=page&action=delete&id={$page_item['page_id']}" ;
        }
        unset($page_item);
        load_view('searchPageResult');
    }
    else
    {
        redirect("?mod=page&action=index");
    }
}

function searchPostAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_post_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_posts` WHERE `post_title` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `post_title` LIKE '%{$search}%' ";
        $search_post_list = get_search_post_list($start,$num_per_page,$where);
        foreach($search_post_list as &$post)
        {
            /* cập nhật link sửa và xóa cho mỗi user */
            $post['url_update'] = "?mod=post&controller=post&action=updatePost&id={$post['post_id']}" ;
            $post['url_delete'] = "?mod=post&controller=post&action=deletePost&id={$post['post_id']}" ;
        }
        unset($post);
        load_view('searchPostResult');
    }
    else
    {
        redirect("?mod=post&controller=post&action=postIndex");
    }
}

function searchCatAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_cat_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_cats` WHERE `content` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `content` LIKE '%{$search}%' ";
        $search_cat_list = get_search_cat_list($start,$num_per_page,$where);
        foreach($search_cat_list as &$cat)
        {
        /* cập nhật link sửa và xóa cho mỗi user */
        $cat['url_update'] = "?mod=post&controller=cat&action=updateCat&id={$cat['cat_id']}" ;
        $cat['url_delete'] = "?mod=post&controller=cat&action=deleteCat&id={$cat['cat_id']}" ;
        }
        unset($cat);
        load_view('searchCatResult');
    }
    else
    {
        redirect("?mod=post&controller=cat&action=catIndex");
    }
}

function searchBrandAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_brand_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_brands` WHERE `content` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `content` LIKE '%{$search}%' ";
        $search_brand_list = get_search_brand_list($start,$num_per_page,$where);
        foreach($brand_list as &$brand)
        {
        /* cập nhật link sửa và xóa cho mỗi user */
        $brand['url_update'] = "?mod=products&controller=brand&action=updateBrand&id={$brand['brand_id']}" ;
        $brand['url_delete'] = "?mod=products&controller=brand&action=deleteBrand&id={$brand['brand_id']}" ;
        }
        unset($brand);
        load_view('searchBrandResult');
    }
    else
    {
        redirect("?mod=products&controller=brand&action=brandIndex");
    }
}

function searchProductAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_product_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `product_name` LIKE '%{$search}%' ";
        $search_product_list = get_search_product_list($start,$num_per_page,$where);
        foreach($search_product_list as &$product)
        {
        /* cập nhật link sửa và xóa cho mỗi user */
        $product['url_update'] = "?mod=products&controller=product&action=updateProduct&id={$product['code']}" ;
        $product['url_delete'] = "?mod=products&controller=product&action=deleteProduct&id={$product['code']}" ;
        }
        unset($product);
        load_view('searchProductResult');
    }
    else
    {
        redirect("?mod=products&controller=product&action=productIndex");
    }
}

function searchOrderAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_order_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_orders` WHERE `fullname` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `fullname` LIKE '%{$search}%' ";
        $search_order_list = get_search_order_list($start,$num_per_page,$where);
        foreach($search_order_list as &$order)
        {
        /* cập nhật link sửa và xóa cho mỗi user */
        $order['url_update'] = "?mod=order&controller=order&action=updateOrder&id={$order['order_id']}" ;
        $order['url_delete'] = "?mod=order&controller=order&action=deleteOrder&id={$order['order_id']}" ;
        $order['url_cus_detail'] = "?mod=order&controller=customer&action=detailCustomer&id={$order['cus_id']}" ;
        $order['url_order_detail'] = "?mod=order&controller=order&action=orderDetail&id={$order['order_id']}" ;
        }
        unset($order);
        load_view('searchOrderResult');
    }
    else
    {
        redirect("?mod=order&controller=order&action=orderIndex");
    }
}

function searchCustomerAction()
{
    if($_GET['search'] != NULL)
    {
        /* phần pagging */
        global $start, $num_page, $page, $search, $search_customer_list;
        $search = $_GET['search'];
        $num_row = db_num_rows("SELECT * FROM `tbl_customers` WHERE `fullname` LIKE '%{$search}%'  ");
        $num_per_page = 8;
        $num_page = ceil($num_row / $num_per_page);
        /* chỉ số bản ghi mỗi trang */
        $page = isset($_GET['page'])? (int)$_GET['page']:1;
        /* Xuất phát từ phàn tử thứ */
        $start = ($page - 1) * $num_per_page;
    
        /* phần index */
        $where = " `fullname` LIKE '%{$search}%' ";
        $search_customer_list = get_search_customer_list($start,$num_per_page,$where);
        foreach($search_customer_list as &$customer)
        {
            /* cập nhật link sửa và xóa cho mỗi user */
            $customer['url_detail'] = "?mod=order&controller=customer&action=detailCustomer&id={$customer['cus_id']}" ;
        }
        unset($customer);
        load_view('searchCustomerResult');
    }
    else
    {
        redirect("?mod=order&controller=customer&action=customerIndex");
    }
}
