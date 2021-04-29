<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới nhãn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên nhãn hàng</label>
                        <input type="text" name="content" id="title" autocomplete="off">
                        <?php echo form_error('content')?>
                        <label>Danh mục</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php
                                global $cat_list;
                                $cat_list = get_dropdown_cat();
                                foreach($cat_list as $cat)
                                {
                            ?>
                            <option value="<?php echo $cat['cat_id']?>" <?php echo set_value_select('cat_id',$cat['cat_id'])?> ><?php echo $cat['content']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php echo form_error('cat_id')?>
                        <button type="submit" name="btn_reg" id="btn_reg">Thêm mới</button>
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