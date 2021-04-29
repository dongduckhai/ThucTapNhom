<?php
get_header();
global $start, $num_page, $page;
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=blog" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Tin tức công nghệ 24h</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                            global $post_list;
                            foreach($post_list as $post)
                            {
                        ?>
                        <li class="clearfix">
                            <a href="<?php echo $post['detail_url']?>" title="" class="thumb fl-left">
                                <img src="admin/<?php echo $post['thumb_url']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo $post['detail_url']?>" title="" class="title"><?php echo $post['post_title']?></a>
                                <span class="create-date"><?php echo date('d-m-Y', $post['created_date'])?></span>
                                <p class="desc"><?php echo $post['post_desc']?></p>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=blog")
            ?>
        </div>
        <?php get_sidebar('hotPost')?>
    </div>
</div>
<?php
get_footer();
?>