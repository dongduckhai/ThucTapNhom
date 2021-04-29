<?php
get_header();
global $product_item;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="pro_name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="pro_name" autocomplete="off" value="<?php echo $product_item['product_name']?>">
                        <?php echo form_error('product_name')?>
                        <label>Nhãn hàng</label>
                        <select name="brand_id">
                            <option value="">-- Chọn nhãn hàng --</option>
                            <?php
                                global $brand_list;
                                $brand_list = get_brand_dropdown();
                                foreach($brand_list as $brand)
                                {
                            ?>
                            <option
                            <?php
                            if(!empty($product_item['brand_id']) && $product_item['brand_id'] == "{$brand['brand_id']}") echo"selected = 'selected';"
                            ?>
                            value="<?php echo $brand['brand_id']?>" <?php echo set_value_select('brand_id',$brand['brand_id'])?> ><?php echo $brand['content']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php echo form_error('brand_id')?>
                        <label for="price">Giá hiện tại</label>
                        <input type="text" name="price" id="price" autocomplete="off" value="<?php echo $product_item['price']?>">
                        <?php echo form_error('price')?>
                        <label for="old_price">Giá cũ (nếu có)</label>
                        <input type="text" name="old_price" id="old_price" autocomplete="off" value="<?php if($product_item['old_price'] != NULL) echo $product_item['old_price']?>">
                        <label for="desc">Mô tả</label>
                        <textarea name="product_desc" id="desc" class="ckeditor"><?php echo $product_item['product_desc']?></textarea>
                        <?php echo form_error('product_desc')?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">... Chọn ...</option>
                            <option
                            <?php
                                if(!empty($product_item['status']) && $product_item['status'] == "1") echo"selected = 'selected';"
                            ?> 
                            value="1" <?php echo set_value_select('status',1)?> >Còn hàng</option>
                            <option
                            <?php
                                if(!empty($product_item['status']) && $product_item['status'] == "2") echo"selected = 'selected';"
                            ?> 
                            value="2" <?php echo set_value_select('status',2)?> >Hot</option>                      
                            <option
                            <?php
                                if(!empty($product_item['status']) && $product_item['status'] == "3") echo"selected = 'selected';"
                            ?> 
                            value="3" <?php echo set_value_select('status',3)?> >Hết hàng</option>
                        </select>
                        <?php echo form_error('status')?>
                        <label for="desc">Nội dung chi tiết</label>
                        <textarea name="product_detail" id="desc" class="ckeditor"><?php echo $product_item['product_detail']?></textarea>
                        <?php echo form_error('product_detail')?>
                        <label>Ảnh tiêu đề</label>
                        <div id="thumb" style="margin-bottom:25px">
                            <input style="margin-bottom:15px" type="file" name="uploadFile" id="upload-thumb">
                            <img id='thumb-img' style="width:150px" src="<?php echo $product_item['thumb_url']?>"/>                         
                        </div>
                        <?php echo form_error('thumb_url')?>
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