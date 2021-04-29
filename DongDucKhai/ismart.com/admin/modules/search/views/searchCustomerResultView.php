<?php
get_header();
global $start, $num_page, $page, $search;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Kết quả tìm kiếm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
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
                                global $search_customer_list;$index = $start;
                                foreach($search_customer_list as $customer)
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
                echo get_pagging($num_page, $page, "?mod=search&action=searchCustomer&search={$search}")
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>