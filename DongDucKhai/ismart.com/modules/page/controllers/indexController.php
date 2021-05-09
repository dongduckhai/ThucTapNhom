<?php
function construct() {
        load_model('index');
    }

function indexAction(){
    $id = (int)$_GET['id'];
    global $page;
    $page = get_page_by_id($id);
    load_view('index');
}

