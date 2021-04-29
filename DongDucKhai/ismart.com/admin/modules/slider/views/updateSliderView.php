<?php
get_header();
global $slider_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label>Ảnh slider</label>
                        <div id="thumb" style="margin-bottom:25px">
                            <input style="margin-bottom:15px" type="file" name="uploadSlider" id="upload-thumb">
                            <?php echo form_error('slider_url')?>
                            <img id='thumb-img' style="width: 150px" src="<?php echo $slider_item['slider_url']?>"  />                                                 
                        </div>
                        <label for="">Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($slider_item['status']) && $slider_item['status'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1" <?php echo set_value_select('status',1)?> >Không sử dụng</option>
                            <option
                            <?php
                                if(!empty($slider_item['status']) && $slider_item['status'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2" <?php echo set_value_select('status',2)?> >Sử dụng</option>
                        </select>
                        <?php echo form_error('status')?>
                        <button type="submit" name="btn_update" id="btn_update">Cập nhật</button>
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