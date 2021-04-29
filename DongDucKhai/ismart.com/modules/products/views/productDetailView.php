<?php
get_header();
global $product_item,$product_item_cat, $same_brand_product_list;
?>
<div id="main-content-wp" class="clearfix detail-product-page">
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
                        <a href="?mod=products&controller=product&id=<?php echo $product_item['cat_id']?>" title=""><?php echo $product_item_cat?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img style="max-width:350px;height:auto;" id="zoom" src="admin/<?php echo $product_item['thumb_url']?>" 
                            data-zoom-image="admin/<?php echo $product_item['thumb_url']?>"/>
                        </a>
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $product_item['product_name']?></h3>
                        <div class="desc">
                            <?php echo $product_item['product_desc']?>
                        </div>
                        <div class="num-product">
                            Sản phẩm: <span class="status"><?php echo show_status($product_item['status']) ?></span>
                            
                        </div>
                        <p class="price"><?php echo currency_format($product_item['price']) ?></p>
                        <a href="?mod=cart&controller=cart&action=addCart&id=<?php echo $product_item['code']?>" title="Thêm vào giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                <?php echo $product_item['product_detail']?>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                            foreach($same_brand_product_list as $same_product)
                            {
                                if($same_product['code'] == $product_item['code'])
                                { 
                                    continue;
                                }
                        ?>
                        <li class="h-308">
                            <a href="<?php echo $same_product['url_detail']?>" title="" class="thumb">
                                <img class="thumb-img" src="admin/<?php echo $same_product['thumb_url']?>">
                            </a>
                            <a href="<?php echo $same_product['url_detail']?>" title="" class="product-name h-33"><?php echo $same_product['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($same_product['price']) ?></span>
                            <?php
                                if($same_product['old_price'] != 0 )
                                {
                            ?>
                                <span class="old"><?php echo currency_format($same_product['old_price'])?></span>
                            <?php
                                }
                            ?>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $same_product['url_addCart']?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $same_product['url_detail']?>" title="" class="buy-now fl-right">Thông tin</a>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('hotProduct')?>
    </div>
</div>
<?php
get_footer();
?>