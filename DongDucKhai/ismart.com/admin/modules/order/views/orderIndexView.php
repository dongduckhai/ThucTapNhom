<?php
get_header();
global $start, $num_page, $page;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">Tất cả (<span class="count" style="color:blue"><?php echo get_num_order();?></span>)</li>
                        </ul>
                        <form method="GET" class="form-s fl-left">
                            <input type="text" name="search" autocomplete="off" placeholder="Nhập tên chủ hóa đơn...">
                            <input type="hidden" name="mod" value="search">
                            <input type="hidden" name="action" value="searchOrder">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Tên khách hàng</span></td>
                                    <td><span class="thead-text">Tổng tiền</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Xem chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                global $order_list; $index = $start;
                                foreach($order_list as $order)
                                {
                                    $index++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index?></span>
                                    <td><span class="tbody-text"><?php echo $order['order_id']?></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $order['url_cus_detail']?>" title=""><?php echo $order['fullname']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $order['url_update']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $order['url_delete']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo currency_format($order['total']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_status_order($order['status'])?></span></td>
                                    <td><span class="tbody-text"><?php echo date('d-m-Y', $order['created_date']) ?></span></td>
                                    <td><a href="<?php echo $order['url_order_detail']?>" title="" class="tbody-text">Xem chi tiết</a></td>
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
                echo get_pagging($num_page, $page, "?mod=order&controller=order&action=orderIndex")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>