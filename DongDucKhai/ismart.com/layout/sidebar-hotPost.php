<div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Bài viết nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        $hot_post_list = get_post_list_by_stt('2');
                        foreach($hot_post_list as $hot_post)
                        {
                        ?>
                        <li class="clearfix">
                            <a href="?mod=blog&action=detailBlog&id=<?php echo $hot_post['post_id']?>" title="" class="thumb fl-left">
                                <img src="admin/<?php echo $hot_post['thumb_url']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=blog&action=detailBlog&id=<?php echo $hot_post['post_id']?>" title="" class="product-name"><?php echo $hot_post['post_title']?></a>
                                <div class="price">
                                    <span class="hot-create-date"><?php echo date('d-m-Y',$hot_post['created_date']) ?></span>
                                </div>
                                <a href="?mod=blog&action=detailBlog&id=<?php echo $hot_post['post_id']?>" title="Xem thêm" class="buy-now">Xem thêm</a>
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