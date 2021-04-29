<?php
get_header();
global $start, $num_page, $page, $search;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">           
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Kết quả tìm kiếm</h3>
                    <a href="?mod=page&action=addPage" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $index = $start;
                                global $search_page_list;
                                foreach($search_page_list as $page_item)
                                {   
                                    $index++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $page_item['url_update']?>" title=""><?php echo $page_item['page_title']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $page_item['url_update']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $page_item['url_delete']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo show_position($page_item['role']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d-m-Y',$page_item['created_date']) ?></span></td>
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
                echo get_pagging($num_page, $page, "?mod=search&action=searchPage&search={$search}")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>