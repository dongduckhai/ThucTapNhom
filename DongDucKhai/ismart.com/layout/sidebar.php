<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                    <?php
                        $cat_list = get_cat_list();
                        foreach($cat_list as $cat)
                        {
                    ?>
                        <li>
                            <a href="?mod=products&action=index2&id=<?php echo $cat['cat_id']?>" title=""><?php echo $cat['content']?></a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>