<?php
get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php
                    global $slider_list;
                    foreach($slider_list as $slider_item)
                    {
                    ?>
                    <div class="item">
                        <img class="img-carousei" src="admin/<?php echo $slider_item['slider_url']?>" alt="">
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- end carousei slider -->
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end support -->
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php
                        global $hot_product_list;
                        foreach($hot_product_list as $hot_product)
                        {
                    ?>
                        <li>
                            <a href="<?php echo $hot_product['url_detail']?>" title="" class="thumb">
                                <img class="thumb-img" src="admin/<?php echo $hot_product['thumb_url']?>">
                            </a>
                            <a href="<?php echo $hot_product['url_detail']?>" title="" class="product-name h-33"><?php echo $hot_product['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($hot_product['price']) ?></span>
                                <?php if($hot_product['old_price'] != 0)
                                {
                                ?>
                                <span class="old"><?php echo currency_format($hot_product['old_price']) ?></span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $hot_product['url_addCart']?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $hot_product['url_detail']?>" title="" class="buy-now fl-right">Thông tin</a>
                            </div>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <!-- end hotProduct -->
            <div class="section" id="list-product-wp">
                <?php
                    $cat_list = get_cat_list();
                    foreach($cat_list as $cat_item)
                    {
                        $category = $cat_item['cat_id'];
                        $product_list = get_product_index_have_same_cat($category);
                        $product_total = get_product_total_have_same_cat($category); 

                ?>
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $cat_item['content']?></h3>
                    <a href="?mod=products&action=index2&id=<?php echo $cat_item['cat_id']?>" class="show-all fl-right">Xem tất cả: <?php echo $product_total?> sản phẩm</a>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                <?php                       
                        $index = 0;
                        foreach($product_list as &$product_item)
                        {
                            $product_item['url_addCart'] = "?mod=cart&controller=cart&action=addCart&id={$product_item['code']}";
                            $product_item['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$product_item['code']}";
                        }
                        unset($product_item);
                        foreach($product_list as $product_item)
                        {
                            $index++;
                            if($index > 8)
                            {
                                break;
                            }
                ?>
                        <li class="h-308">
                            <a href="<?php echo $product_item['url_detail']?>" title="" class="thumb">
                                <img class="thumb-img" src="admin/<?php echo $product_item['thumb_url']?>">
                            </a>
                            <a href="<?php echo $product_item['url_detail']?>" title="" class="product-name h-33">
                                <?php echo $product_item['product_name']?>
                            </a>
                            <div class="price">
                                <span class="new">
                                    <?php echo currency_format($product_item['price']) ?>
                                </span>
                                <span class="old">
                                    <?php
                                    if($product_item['old_price'] != 0)
                                    echo currency_format($product_item['old_price']);
                                    ?>
                                </span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $product_item['url_addCart']?>" title="Thêm giỏ hàng"
                                    class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $product_item['url_detail']?>" title="Thông tin chi tiết"
                                    class="buy-now fl-right">Thông tin</a>
                            </div>
                        </li>
                        <?php
                        }
                    ?>
                    </ul>
                </div>
                <?php
                    }
                ?>
            </div>
            <!-- endProduct -->
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('hotProduct')?>
    </div>
</div>
<?php
get_footer();
?>