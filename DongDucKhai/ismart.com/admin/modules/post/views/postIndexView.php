<?php
get_header();
global $start, $num_page, $page, $sort;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&controller=post&action=addPost" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">Tất cả (<span class="count" style="color:blue"><?php echo get_num_post();?></span>)</li>
                        </ul>
                        <form method="GET" class="form-s fl-left">
                            <input type="text" name="search" autocomplete="off" placeholder="Nhập tiêu đề bài viết...">
                            <input type="hidden" name="mod" value="search">
                            <input type="hidden" name="action" value="searchPost">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                        <form method="GET" action="" class="form-actions fl-right">
                            <input type="hidden" name = "mod" value = "post">
                            <input type="hidden" name = "controller" value = "post">
                            <input type="hidden" name = "action" value = "postIndex">
                            <select name="sort">
                                <?php
                                $cat_dropdown = get_cat_dropdown();
                                foreach($cat_dropdown as $cat)
                                {
                                ?>
                                <option value="<?php echo $cat['cat_id']?>"<?php if($sort == $cat['cat_id']) echo "selected = 'selected' "?>><?php echo $cat['content']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button type="submit" name="btn_sort">Phân loại</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td style="width:30%"><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    global $post_list; $index = $start;
                                    foreach($post_list as $post)
                                    {     
                                        $index++;                                  
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $post['url_update']?>" title=""><?php echo $post['post_title']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $post['url_update']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $post['url_delete']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo get_category_by_cat_id($post['cat_id']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_position($post['role']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_status_post($post['status']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d-m-Y', $post['created_date']) ?></span></td>
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
                echo get_pagging($num_page, $page, "?mod=post&controller=post&action=postIndex&sort={$sort}")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>