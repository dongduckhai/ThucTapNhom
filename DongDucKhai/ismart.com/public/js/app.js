$(document).ready(function () {
    //================================Sidebar Admin=================================

    //Click vào 1 mục thì menu con sổ xuống
    $(".nav-link.active .sub-menu").slideDown();

    $("#sidebar-menu .arrow").click(function () {
        //Click vào mũi tên thì menu số lên sổ xuống
        $(this).parents("li").children(".sub-menu").slideToggle();
        //Mũi tên thay đổi hình dạng ngang dọc
        $(this).toggleClass("fa-angle-right fa-angle-down");
    });

    //================================Check All====================================

    //Click vào checkAll
    $("input[name='checkall']").click(function () {

        var checked = $(this).is(":checked");
        //Gán thuộc tính checked cho toàn bộ checkbox của bảng
        $(".table-checkall tbody tr td input:checkbox").prop(
            "checked",
            checked
        );
    });

    //============================== Xác nhận xóa ==================================

    $(".delete-btn").on("click", function () {
        $("div#deleteModal").modal("show");
    });

    //============================== Ajax update====================================

    $("input.num-order").change(function () {
        /* lấy dữ liệu từ view */
        var id = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        var qty = $(this).val();
        var data = { id: id, qty: qty };
        // đổ sang file xử lý
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: "json",
            // xủ lý xong đổ ra đây
            success: function (data) {
                $("td#sub-total-" + id + " span#sub-total-num").text(
                    data.sub_total
                );
                $("p#total-price span#total-num").text(data.total);
                $("a#btn-cart span#num").text(data.num_order);
                $("div#dropdown p.desc span").text(data.num_order);
                $("div.total-price p.price").text(data.total);
                $("div.info p.qty span").text(data.num_per_product);
            },
            // kra lỗi
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        });
    });

    //============================== Ajax add Cart==================================
    $("a.add-cart").on("click", function () {
        event.preventDefault();
        /* lấy dữ liệu từ view */
        var url = $(this).attr("data-url");
        var data = {};
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: "json",
            success: function (data) {
                $("a#btn-cart span#num").text(data.num_order);
                $("div#dropdown p.desc span").text(data.num_order);
                $("div.total-price p.price").text(data.total);
                swal("Thành công !", "Đã thêm vào giỏ hàng", "success").then(
                    (value) => {
                        location.reload();
                    }
                );
            },
            // kra lỗi
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        });
    });
});
