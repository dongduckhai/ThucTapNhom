<?php
get_header();
global $start, $num_page, $page;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=addSlider" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">Tất cả (<span class="count" style="color:blue"><?php echo get_num_slider();?></span>)</li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    global $slider_list; $index = $start;
                                    foreach($slider_list as $slider)
                                    {     
                                        $index++;                                  
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index?></h3></span>
                                    <td class="clearfix">
                                        <div class="fl-left">
                                            <a href="<?php echo $slider['url_update']?>" title=""><img class="slider-thumb" src="<?php echo $slider['slider_url']?>" alt=""></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $slider['url_update']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $slider['url_delete']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo show_position($slider['role']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_status_slider($slider['status']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d-m-Y', $slider['created_date']) ?></span></td>
                                </tr>
                            </tbody>
                                <?php
                                    }
                                ?>
                        </table>
                    </div>

                </div>
            </div>
            <?php
                echo get_pagging($num_page, $page, "?mod=slider&action=sliderIndex")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>