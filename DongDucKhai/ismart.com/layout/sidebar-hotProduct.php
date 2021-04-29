<div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        $hot_product_list = get_product_list_by_stt('2');
                        foreach($hot_product_list as $hot_product)
                        {
                        ?>
                        <li class="clearfix">
                            <a href="?mod=products&controller=product&action=productDetail&id=<?php echo $hot_product['code']?>" title="" class="thumb fl-left">
                                <img src="admin/<?php echo $hot_product['thumb_url']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=products&controller=product&action=productDetail&id=<?php echo $hot_product['code']?>" title="" class="product-name"><?php echo $hot_product['product_name']?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($hot_product['price']) ?></span>
                                    <?php 
                                        if($hot_product['old_price'] != 0)
                                        {
                                    ?>
                                    <span class="old"><?php echo currency_format($hot_product['old_price']) ?></span>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <a href="?mod=cart&controller=cart&action=addCart&id=<?php echo $hot_product['code']?>" title="Mua ngay" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner-2.png" alt="">
                    </a>
                </div>
            </div>
        </div>