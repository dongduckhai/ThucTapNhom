$(function(){
    $('input.num-order').change(function(){
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = {id: id, qty: qty};
        $.ajax({
            url: '?mod=cart&controller=cart&action=updateCart',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data){
                /* dữ liệu được đổ ra */
                $('td#sub-total-'+id).text(data.sub_total);
                $('p#total-price span').text(data.total);
                $('div#btn-cart span#num').text(data.num_order);
                $('div#dropdown p.desc span').text(data.num_order);
                $("div.total-price p.price").text(data.total);
            },
            /* kra lỗi */
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});