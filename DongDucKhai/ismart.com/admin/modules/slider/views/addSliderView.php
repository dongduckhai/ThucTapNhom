<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="">Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option value="1" <?php echo set_value_select('status',1)?> >Không sử dụng</option>
                            <option value="2" <?php echo set_value_select('status',2)?> >Đang sử dụng</option>       
                        </select>
                        <?php echo form_error('status')?>
                        <label>Ảnh slider</label>
                        <div id="thumb" style="margin-bottom:25px">
                            <input style="margin-bottom:15px" type="file" name="uploadSlider" id="upload-slider">
                            <img id='slider-img' style="width:150px" src="<?php echo set_value('slider_url')?>"/>                         
                        </div>
                        <?php echo form_error('slider_url')?>
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