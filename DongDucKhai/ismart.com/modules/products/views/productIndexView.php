<?php
get_header();
global $brand_content, $brand_item, $cat_content, $start, $num_page, $page;
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=products" title="">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="?mod=products&controller=index&action=index2&id=<?php echo $brand_item['cat_id'] ?>" title="">
                            <?php echo $cat_content?>
                        </a>
                    </li>
                    <li>
                        <a title="">
                            <?php echo $brand_item['content'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">
                        <?php echo $brand_item['content'] ?>
                    </h3>
                    <div class="filter-wp fl-right">
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="sort">
                                    <option>... Chọn ...</option>
                                    <option value="1">Tên sản phẩm từ A-Z</option>
                                    <option value="2">Giá từ thấp đến cao</option>
                                    <option value="3">Giá từ cao đến thấp</option>
                                </select>
                                <button type="submit" name="btn_sort">Sắp xếp</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        global $product_list; 
                        foreach($product_list as $product)
                        {                          
                        ?>
                        <li class="h-308">
                            <a href="<?php echo $product['url_detail']?>" title="" class="thumb">
                                <img class="thumb-img" src="admin/<?php echo $product['thumb_url']?>">
                            </a>
                            <a href="<?php echo $product['url_detail']?>" title="" class="product-name h-33">
                                <?php echo $product['product_name']?>
                            </a>
                            <div class="price">
                                <span class="new">
                                    <?php echo currency_format($product['price']) ?>
                                </span>
                                <?php
                                if($product['old_price'] != 0)
                                {
                                ?>
                                <span class="old">
                                    <?php echo currency_format($product['old_price']) ?>
                                </span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $product['url_addCart']?>" title="Thêm giỏ hàng"
                                    class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $product['url_detail']?>" title="Thông tin chi tiết"
                                    class="buy-now fl-right">Thông tin</a>
                            </div>
                        </li>
                        <?php                            
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=products&controller=product&id={$brand_item['brand_id']}")
            ?>
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('hotProduct')?>
    </div>
</div>
<?php
get_footer();
?>