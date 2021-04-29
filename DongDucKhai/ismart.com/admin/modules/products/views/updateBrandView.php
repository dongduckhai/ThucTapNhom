<?php
get_header();
global $brand_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật nhãn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên nhãn hàng</label>
                        <input type="text" name="content" id="title" autocomplete="off" value="<?php echo $brand_item['content']?>">
                        <?php echo form_error('content')?>
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
                            if(!empty($brand_item['cat_id']) && $brand_item['cat_id'] == "{$cat['cat_id']}") echo"selected = 'selected';"
                            ?>
                            value="<?php echo $cat['cat_id']?>" <?php echo set_value_select('cat_id',$cat['cat_id'])?> ><?php echo $cat['content']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php echo form_error('cat_id')?>
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