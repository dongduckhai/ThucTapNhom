<?php
get_header();
global $start, $num_page, $page;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" style="margin-left:25px;" class="fl-left">Nhóm quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">ID</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Vị trí</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $temp = $start;
                                global $user_list;
                                foreach($user_list as $user)
                                {   
                                    $temp++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $temp?></td></span>
                                    <td><span class="tbody-text"><?php echo $user['user_id']?></td></span>
                                    <td><span class="tbody-text"><?php echo $user['fullname']?></span></td>
                                    <td><span class="tbody-text"><?php echo show_position($user['role'])?></span></td>
                                    <!-- show_posistion ở trong helper/users -->
                                    <td><span class="tbody-text"><?php echo $user['email']?></span></td>
                                    <td><span class="tbody-text"><?php echo $user['phone_number']?></span></td>
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
                echo get_pagging($num_page, $page, "?mod=users&controller=team&action=teamIndex")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>