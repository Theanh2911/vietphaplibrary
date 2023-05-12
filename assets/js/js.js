$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 250) {
            $("#back-to-top").fadeIn();
        } else {
            $("#back-to-top").fadeOut();
        }
    });
    $("#back-to-top").click(function() {
        $('html,body').animate({ scrollTop: 0 }, 600);
        return false;
    });
    $('#increase').click(function() {
        if ($('#num_order').val() != '') {
            $('#num_order').val(parseInt($('#num_order').val()) + 1);
        } else {
            $('#num_order').val(1);
        }
    });
    $('#descrease').click(function() {
        if ($('#num_order').val() != '' && $('#num_order').val() != '1' && $('#num_order').val() != '0') {
            $('#num_order').val(parseInt($('#num_order').val()) - 1);
        } else if ($('#num_order').val() == '' || $('#num_order').val() == '0') {
            $('#num_order').val(1);
        }

    });

    $(".menu_responsive").click(function() {
        $("body").toggleClass("open-respon-menu")
        $(".menu_responsive>i").toggleClass("fa-bars fa-times")

        $("ul.respon_menu>li>a").removeClass("sub");
        $(".sub_menu_responsive").stop().slideUp(500);
        $("ul.sub_menu_responsive>li>a").removeClass("sub_1");
        $(".sub_menu_responsive_1").stop().slideUp(500);
        // return false;
    });

    $(window).resize(function() {
        if ($(this).width() >= 768) {
            $("body").removeClass("open-respon-menu");
            $(".menu_responsive>i").removeClass("fa-times").addClass("fa-bars");
        }
    });
    $(window).scroll(function() {
        $("body").removeClass("open-respon-menu");
        $(".menu_responsive>i").removeClass("fa-times").addClass("fa-bars");
    });

    $(".respon_menu>li>a").click(function() {

        if ($(this).hasClass("sub")) {

            $(this).next(".sub_menu_responsive").stop().slideUp(500);
            $(this).removeClass("sub");
            $("ul.sub_menu_responsive>li>a").removeClass("sub_1");
            $(".sub_menu_responsive_1").stop().slideUp(500);

        } else {
            $(".sub_menu_responsive").stop().slideUp(500);
            $(this).next(".sub_menu_responsive").stop().slideDown(500);
            $("ul.respon_menu>li>a").removeClass("sub");

            $(this).addClass("sub");
        }
    });

    $(".sub_menu_responsive>li>a").click(function() {

        if ($(this).hasClass("sub_1")) {

            $(this).next(".sub_menu_responsive_1").stop().slideUp(500);
            $(this).removeClass("sub_1");


        } else {
            $(".sub_menu_responsive_1").stop().slideUp(500);
            $(this).next(".sub_menu_responsive_1").stop().slideDown(500);
            $("ul.sub_menu_responsive>li>a").removeClass("sub_1");

            $(this).addClass("sub_1");
        }
    });
});