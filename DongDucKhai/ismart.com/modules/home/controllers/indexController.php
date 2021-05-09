<?php

function construct() {
load_model('index');
}

function indexAction() 
{
    global $hot_product_list, $slider_list;
    $hot_product_list = get_product_list_by_stt('2');
    foreach($hot_product_list as &$hot_product)
    {
        $hot_product['url_detail'] = "?mod=products&controller=product&action=productDetail&id={$hot_product['code']}";
        $hot_product['url_addCart'] = "?mod=cart&controller=cart&action=addCart&id={$hot_product['code']}";
    }
    unset($hot_product);
    $slider_list = get_slider_list_by_stt('2');
    load_view('index');
}
