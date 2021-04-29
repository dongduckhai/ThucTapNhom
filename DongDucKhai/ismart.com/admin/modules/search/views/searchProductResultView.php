<?php
get_header();
global $start, $num_page, $page, $search;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Kết quả tìm kiếm</h3>
                    <a href="?mod=products&controller=product&action=addProduct" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td id="product-name"><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Nhãn hàng</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                global $search_product_list; $index = $start;
                                foreach($search_product_list as $product)
                                {
                                    $index++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index?></h3></span>
                                    <td><span class="tbody-text"><?php echo $product['code']?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $product['thumb_url']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $product['url_update']?>" title=""><?php echo $product['product_name']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $product['url_update']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $product['url_delete']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo currency_format($product['price']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo get_category_by_cat_id($product['cat_id']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo get_brand_by_brand_id($product['brand_id']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_status_product($product['status']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_position($product['role']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d-m-Y', $product['created_date'])?></span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=search&action=searchProduct&search={$search}")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>