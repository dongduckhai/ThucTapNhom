<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/app.js" type="text/javascript"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" 
        nonce="tGIhkK89"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?mod=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?mod=products" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?mod=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&id=4" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&id=5" title="">Hỏi đáp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?mod=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                            <form class="form-search" method="GET" >
                                <input type="hidden" name="mod" value="search">
                                <input type="text" name="search" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!" autocomplete="off" spellcheck="false">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <?php 
                                        $cart_info = get_info_cart();
                                        if($cart_info != false && $cart_info['total'] != 0 )
                                        {
                                        ?>
                                        <span id="num"><?php echo $cart_info['num_order']?></span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php echo $cart_info['num_order'] ?></span> sản phẩm trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php
                                                $buy_list = get_buy_list();
                                                foreach($buy_list as $item)
                                                {
                                            ?>
                                            <li class="clearfix">
                                                <a href="?mod=products&controller=product&action=productDetail&id=<?php echo $item['code']?>" title="" class="thumb fl-left">
                                                    <img src="admin/<?php echo $item['thumb_url']?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="?mod=products&controller=product&action=productDetail&id=<?php echo $item['code']?>" class="product-name"><?php echo $item['product_name']?></a>
                                                    <p class="price"><?php echo currency_format($item['price']) ?></p>
                                                </div>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo currency_format($cart_info['total']) ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="?mod=cart&controller=cart" title="Giỏ hàng" class="view-cart"><p style='text-align:center;'>Giỏ hàng</p></a>
                                        </dic>
                                    </div>
                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>