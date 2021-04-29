<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="title" autocomplete="off" value="<?php echo set_value('post_title')?>">
                        <?php echo form_error('post_title')?>
                        <label>Danh mục</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php
                                global $cat_list;
                                $cat_list = get_cat_dropdown();
                                foreach($cat_list as $cat)
                                {
                            ?>
                            <option value="<?php echo $cat['cat_id']?>" <?php echo set_value_select('cat_id',$cat['cat_id']) ?> ><?php echo $cat['content']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php echo form_error('cat_id')?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn --</option>
                            <option value="1"<?php echo set_value_select('status',1) ?>>Bình thường</option>
                            <option value="2"<?php echo set_value_select('status',2) ?>>Hot</option>
                        </select>
                        <?php echo form_error('status')?>
                        <label for="desc">Mô tả (ngắn)</label>
                        <input type="text" name="post_desc" id="desc" autocomplete="off" value="<?php echo set_value('post_desc')?>">
                        <?php echo form_error('post_desc')?>
                        <label for="desc">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"><?php echo set_value('content')?></textarea>
                        <?php echo form_error('content')?>
                        <label>Ảnh tiêu đề</label>
                        <div id="thumb" style="margin-bottom:25px">
                            <input style="margin-bottom:15px" type="file" name="uploadFile" id="upload-thumb">
                            <img id='thumb-img' style="width:150px" src="<?php echo set_value('thumb_url')?>"/>                         
                        </div>
                        <?php echo form_error('thumb_url')?>
                        <button style="margin: 20px 0px" type="submit" name="btn_reg" id="btn_reg">Thêm mới</button>
                        <?php if(isset($_POST['btn_reg'])) echo alert_success()?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>