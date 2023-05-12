$(document).ready(function() {
    $(".num_order").change(function() {
        var id = $(this).attr("data_id");
        var number_product = $(this).val();
        // alert(id + '+++' + number_product);
        var data = { id: id, number_product: number_product };
        console.log(data);
        $.ajax({
            url: "?mod=cart&controller=index&action=update_cart_ajax",
            method: "POST",
            data: data,
            dataType: "json",
            success: function(data) {
                $("#total_product_" + id).text(data.total_product);
                $("#total_ajax").text(data.total);
                // $("#num").text(data.total_number_product)
                console.log(data);
            },
        });
    });

    function show_cart() {
        $.ajax({
            url: "?mod=cart&controller=index&action=show_cart_ajax",
            method: "POST",
            success: function(data) {
                $("#load_data_ajax").html(data);
                console.log(data);
            },
        });
    };

    show_cart();

    $(document).on('click', '#delete_id', function() {
        var id = $(this).attr('delete_id');
        // alert(id);
        // alert(id + '+++' + number_product);
        var data = { id: id };
        console.log(data);
        $.ajax({
            url: "?mod=cart&controller=index&action=delete_id_ajax",
            method: "POST",
            data: data,
            // dataType: "json",
            success: function(data) {
                // alert("delete thanh cong");
                show_cart();
                // console.log(data);
            },
        });
    });

    // return false;
});





function increase(id) {
    if ($('#num_order_' + id).val() != '') {
        $('#num_order_' + id).val(parseInt($('#num_order_' + id).val()) + 1);
    } else {
        $('#num_order_' + id).val(1);
    }
    var number_product = $('#num_order_' + id).val();
    // alert(id + '+++' + number_product);
    var data = { id: id, number_product: number_product };
    console.log(data);
    $.ajax({
        url: "?mod=cart&controller=index&action=update_cart_ajax",
        method: "POST",
        data: data,
        dataType: "json",
        success: function(data) {
            $("#total_product_" + id).text(data.total_product);
            $("#total_ajax").text(data.total);
            // $("#num").text(data.total_number_product)
            // console.log(data);
        },
        error: function(xhr, ajaxOptions, throwError) {
            console.log(xhr.status);
            console.log(throwError);
        }
    });
};

function descrease(id) {
    if ($('#num_order_' + id).val() != '' && $('#num_order_' + id).val() != '1' && $('#num_order_' + id).val() != '0') {
        $('#num_order_' + id).val(parseInt($('#num_order_' + id).val()) - 1);
    } else if ($('#num_order_' + id).val() == '' || $('#num_order_' + id).val() == '0') {
        $('#num_order_' + id).val(1);
    }
    var number_product = $('#num_order_' + id).val();
    // alert(id + '+++' + number_product);
    var data = { id: id, number_product: number_product };
    console.log(data);
    $.ajax({
        url: "?mod=cart&controller=index&action=update_cart_ajax",
        method: "POST",
        data: data,
        dataType: "json",
        success: function(data) {
            $("#total_product_" + id).text(data.total_product);
            $("#total_ajax").text(data.total);
            // $("#num").text(data.total_number_product)
            // console.log(data);
        },
    });
}