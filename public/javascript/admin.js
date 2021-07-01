document.addEventListener("DOMContentLoaded", function() {
    var flag = Array();
    var scrollViewArray = Array();
    scrollViewArray[0] = $(".item-admin-new-child");
    $('.item-admin-new-child').remove();
    flag[0] = false;
    $(window).scroll(function() {
        if ($(window).scrollTop() >= $('.item-admin-new').offset().top && flag[0] == false) {
            $('.item-admin-new').append(scrollViewArray[0]);
            flag[0] = true;
        }
    });
    scrollViewArray[1] = $(".employee-admin-new-child");
    $('.employee-admin-new-child').remove();
    flag[1] = false;
    $(window).scroll(function() {
        if ($(window).scrollTop() >= $('.employee-admin-new').offset().top && flag[1] == false) {
            $('.employee-admin-new').append(scrollViewArray[1]);
            flag[1] = true;
        }
    });
    scrollViewArray[2] = $(".customer-admin-new-child");
    $('.customer-admin-new-child').remove();
    flag[2] = false;
    $(window).scroll(function() {
        if ($(window).scrollTop() >= $('.customer-admin-new').offset().top && flag[2] == false) {
            $('.customer-admin-new').append(scrollViewArray[2]);
            flag[2] = true;
        }
    });
    scrollViewArray[3] = $(".order-admin-new-child");
    $('.order-admin-new-child').remove();
    flag[3] = false;
    $(window).scroll(function() {
        if ($(window).scrollTop() >= $('.order-admin-new').offset().top - 300 && flag[3] == false) {
            $('.order-admin-new').append(scrollViewArray[3]);
            flag[3] = true;
        }
    });



})