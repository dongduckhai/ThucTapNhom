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
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">Tất cả (<span class="count" style="color:blue"><?php echo get_num_customer()?></span>)</li>
                        </ul>
                        <form method="GET" class="form-s fl-left">
                            <input type="text" name="search" autocomplete="off" placeholder="Nhập tên khách hàng...">
                            <input type="hidden" name="mod" value="search">
                            <input type="hidden" name="action" value="searchCustomer">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                global $customer_list;$index = $start;
                                foreach($customer_list as $customer)
                                {
                                    $index++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $index?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $customer['url_detail']?>" title=""><?php echo $customer['fullname']?></a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $customer['phone_number']?></span></td>
                                    <td><span class="tbody-text"><?php echo $customer['email']?></span></td>
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
                echo get_pagging($num_page, $page, "?mod=order&controller=customer&action=customerIndex")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>