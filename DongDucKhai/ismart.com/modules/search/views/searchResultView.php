<?php
get_header();
global $num_page, $page, $search;
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
                        <a title="Tìm kiếm">Tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Kết quả tìm kiếm cho "<?php echo $search?>"</h3>
                </div>
                <?php
                global $search_product_list; 
                if($search_product_list != NULL)
                {
                ?>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach($search_product_list as $product)
                        {                          
                        ?>
                        <li class="h-308">
                            <a href="<?php echo $product['url_detail']?>" title="" class="thumb">
                                <img class="thumb-img" src="admin/<?php echo $product['thumb_url']?>">
                            </a>
                            <a href="<?php echo $product['url_detail']?>" title="" class="product-name h-33"><?php echo $product['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($product['price']) ?></span>
                                <?php
                                if($product['old_price'] != 0)
                                {
                                ?>
                                <span class="old"><?php echo currency_format($product['old_price']) ?></span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $product['url_addCart']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $product['url_detail']?>" title="Thông tin chi tiết" class="buy-now fl-right">Thông tin</a>
                            </div>
                        </li>
                        <?php                            
                        }
                        ?>
                    </ul>
                </div>
                <?php
                }
                else
                {
                ?>
                <p style="font-size:20px">Không tìm thấy sản phẩm nào</p>
                <img src="public/images/search_not_found.png" alt="">
                <?php
                }
                ?>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=search&search={$search}")
            ?>
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('hotProduct')?>
    </div>
</div>
<?php
get_footer();
?>