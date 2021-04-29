<?php
get_header();
global $post_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="title" autocomplete="off" value="<?php echo $post_item['post_title'] ?>">
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
                            <option
                            <?php
                            if(!empty($post_item['cat_id']) && $post_item['cat_id'] == "{$cat['cat_id']}") echo"selected = 'selected';"
                            ?>
                            value="<?php echo $cat['cat_id']?>" <?php echo set_value_select('cat_id',$cat['cat_id'])?> ><?php echo $cat['content']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php echo form_error('cat_id')?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($post_item['status']) && $post_item['status'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1" <?php echo set_value_select('status',1)?> >Bình thường</option>
                            <option
                            <?php
                                if(!empty($post_item['status']) && $post_item['status'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2" <?php echo set_value_select('status',2)?> >Hot</option>
                        </select>
                        <?php echo form_error('status')?>
                        <label for="desc">Mô tả (ngắn)</label>
                        <input type="text" name="post_desc" id="desc" autocomplete="off" value="<?php echo $post_item['post_desc']?>">
                        <?php echo form_error('post_desc')?>
                        <label for="desc">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"><?php echo $post_item['content']?></textarea>
                        <?php echo form_error('content')?>
                        <label>Ảnh tiêu đề</label>
                        <div id="thumb" style="margin-bottom:25px">
                            <input style="margin-bottom:15px" type="file" name="uploadFile" id="upload-thumb">
                            <?php echo form_error('thumb_url')?>
                            <img id='thumb-img' style="width: 150px" src="<?php echo $post_item['thumb_url']?>"  />                                                 
                        </div>
                        <button style="margin: 20px 0px" type="submit" name="btn_update" id="btn_update">Cập nhật</button>
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