<?php
get_header();
global $start, $num_page, $page, $search;
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Kết quả tìm kiếm</h3>
                    <a href="?mod=post&controller=cat&action=addCat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="filter-wp clearfix">
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                global $search_cat_list;
                                $index = $start;
                                foreach($search_cat_list as $cat)
                                {
                                    $index++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text">
                                            <?php echo $index?>
                                            </h3>
                                        </span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $cat['url_update']?>" title="">
                                                <?php echo $cat['content']?>
                                            </a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $cat['url_update']?>" title="Sửa" class="edit"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $cat['url_delete']?>" title="Xóa" class="delete"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">
                                            <?php echo show_position($cat['role']) ?>
                                        </span></td>
                                    <td><span class="tbody-text">
                                            <?php echo date('d-m-y',$cat['created_date']) ?>
                                        </span></td>
                                </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=search&action=searchCat&search={$search}")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>