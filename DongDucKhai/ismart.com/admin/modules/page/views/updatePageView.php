<?php
get_header();
global $page_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cật nhật trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="page_title" id="title" autocomplete="off" value="<?php echo $page_item['page_title'] ?>">
                        <?php echo form_error('page_title')?>
                        <label for="desc">Mô tả</label>
                        <textarea name="content" id="desc" class="ckeditor">
                        <?php echo $page_item['content']?>
                        </textarea>
                        <?php echo form_error('content')?>
                        <button type="submit" name="btn_update" id="btn_reg">Cập nhật</button>
                        <?php if(isset($_POST['btn_update'])) echo alert_success()?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>