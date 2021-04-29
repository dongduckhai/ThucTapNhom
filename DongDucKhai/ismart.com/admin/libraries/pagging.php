<?php
    function get_pagging($num_page,$page,$base_url='')
    {
        $str_pagging = "<div class='section' id='paging-wp'>";
        $str_pagging .="<div class='section-detail clearfix'>";
        $str_pagging .="<ul id='list-paging' class='fl-right'>";
        if($page > 1)
        {
            $pre_page = $page - 1;
            $str_pagging .="<li><a href='{$base_url}&page={$pre_page}' >&laquo;Trước</a></li>";
        }
        for($i = 1; $i <= $num_page; $i++)
        {
            $active = '';
            if($i == $page)
            $active = 'active';
            $str_pagging .="<li><a class='{$active}' href='{$base_url}&page={$i}' >{$i}</a></li>";
        }
        if($page < $num_page)
        {
            $next_page = $page + 1;
            $str_pagging .="<li><a href='{$base_url}&page={$next_page}' >Sau&raquo;</a></li>";
        }
        $str_pagging .="</ul>";
        $str_pagging .="</div>";
        $str_pagging .="</div>";
        return $str_pagging;
    }
?>