<?php
get_header();
global $cat_content, $brand_list;
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
                        <a title=""><?php echo $cat_content ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <?php
                    foreach($brand_list as $brand_item)
                    {
                        $brand_id = $brand_item['brand_id'];
                        $product_list = get_product_index_have_same_brand($brand_id);
                        $product_total = get_product_total_have_same_brand($brand_id); 

                ?>
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $brand_item['content']?></h3>
                    <a href="?mod=products&controller=product&id=<?php echo $brand_item['brand_id']?>" class="show-all fl-right" >Xem tất cả: <?php echo $product_total?> sản phẩm</a>
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
            <!-- danh sách sản phẩm -->
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('hotProduct')?>
    </div>
</div>
<?php
get_footer();
?>