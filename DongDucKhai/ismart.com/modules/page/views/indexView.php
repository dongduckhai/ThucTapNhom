<?php
get_header();
global $page;
?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=about" title="Giới thiệu">
                            <?php echo $page['page_title']?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $page['page_title']?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">
                        <?php echo date('d-m-Y', $page['created_date'])?>
                    </span>
                    <?php echo $page['content'] ?>
                </div>
            </div>
        </div>
        <?php get_sidebar('hotPost')?>
    </div>
</div>
<?php
get_footer();
?>