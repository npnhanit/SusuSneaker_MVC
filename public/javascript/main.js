document.addEventListener("DOMContentLoaded", function() {
    $(document).ready(function() {
        $(document).ready(function() {
            $(window).resize(function() {
                var a = document.querySelector(".carousel-inner");
                var height_img_intro = a.offsetHeight;
                $('#intro').css('height', height_img_intro);
            });
        });


    });

    // Nav admin
    $(document).ready(function() {
        $('.admin-item').click(function(e) {
            $(this).toggleClass('color-visited');
            $('.admin-item-child').toggle(500);
            $('.admin-triangle-item').toggleClass('fa-caret-right');
            $('.admin-triangle-item').toggleClass('fa-caret-down');
        });
    });

    $(document).ready(function() {
        $('.admin-customer').click(function(e) {
            $(this).toggleClass('color-visited');
            $('.admin-customer-child').toggle(500);
            $('.admin-triangle-customer').toggleClass('fa-caret-right');
            $('.admin-triangle-customer').toggleClass('fa-caret-down');

        });
    });

    $(document).ready(function() {
        $('.admin-employee').click(function(e) {
            $(this).toggleClass('color-visited');
            $('.admin-employee-child').toggle(500);
            $('.admin-triangle-employee').toggleClass('fa-caret-right');
            $('.admin-triangle-employee').toggleClass('fa-caret-down');
        });
    });

    var admin_child = document.getElementsByClassName('admin-child');
    var admin_triangle_hide = document.getElementsByClassName('admin-triangle-hide');

    for (let i = 0; i < $('.admin-triangle-hide').length; i++) {
        $('.admin-triangle-hide').get(i).classList.add('d-none');
    }


    for (let t = 0; t < admin_child.length; t++) {
        admin_child[t].onclick = function() {
            admin_triangle_hide[t].classList.remove('d-none');
            for (let i = 0; i < admin_child.length; i++) {
                if (i != t)
                    admin_triangle_hide[i].classList.add('d-none');
            }
        }
    }
    // add sp


    //detail component
    var header = document.querySelector("#header");
    var height_header = header.offsetHeight; // Get height header
    var height_nav = $('#nav').outerHeight() - 5;
    var height_footer = $('#footer').outerHeight();
    var height_main = $("#main").outerHeight();
    var sumheight;
    $(document).ready(function() {
        $(window).scroll(function() { //event scroll
            var h = $('html,body').scrollTop(); //height scrolled
            var height_side_bar = $(".side-bar-item").outerHeight();
            if (h > height_header) {
                sumheight = h - height_header + height_nav;
                if (h < height_main - height_header + height_nav * 2 - height_side_bar)
                    $('.detail-item-component-r').css({ "margin-top": sumheight + "px" });
            } else {
                $('.detail-item-component-r').css({ "margin-top": "0px" });
            }
        });
    });

    //size-table
    $('.main-table-size-temp').click(function() {
        $('.main-table-size').addClass("hide");
        $('.main-table-size-temp').addClass("hide");
        $('.main-table-size').removeClass("show");
        $('.main-table-size-temp').removeClass("show");
    });
    $('.button-size').click(function() {
        $('.main-table-size').addClass("show");
        $('.main-table-size-temp').addClass("show");
        $('.main-table-size').removeTogger("hide");
        $('.main-table-size-temp').removeClass("hide");
    });
    //detail-item-size
    var btn_size = document.querySelectorAll('.btn-size');
    $('.btn-add-cart').attr("disabled", true);
    $(document).ready(function() {
        for (let i = 0; i < btn_size.length; i++) {
            btn_size[i].onclick = function() {
                $('.btn-add-cart').attr("disabled", false);
                btn_size[i].classList.add('btn-size-submit');
                for (let j = 0; j < btn_size.length; j++) {
                    if (j != i) {
                        btn_size[j].classList.remove('btn-size-submit');
                    }
                }
            }
        }
    });

    //check size
    // console.log(btn_size[5].textContent);

    // main loading ajax

    var addCart_temp = document.querySelector('.main-table-addCart-temp');
    var addCart_child = document.querySelector('.table-addCart-child');
    $('.main-table-addCart-temp').remove();
    $('.table-addCart-child').remove();
    $(document).ready(function() {
        var ajax = false;
        $(document).ajaxStart(function() {
            $("#loading").show();
            ajax = true;
        });
        $(document).ajaxStop(function() {
            $("#loading").hide();
            if (ajax == true) {
                $('.main-table-addCart').append(addCart_temp);
                $('.main-table-addCart').append(addCart_child);
                $('.main-table-addCart').addClass("show");
                $('.main-table-addCart-temp').addClass("show");
                $('.main-table-addCart').removeClass("hide");
                $('.main-table-addCart-temp').removeClass("hide");
                $('.main-table-addCart-temp').click(function() {
                    $('.main-table-addCart').addClass("hide");
                    $('.main-table-addCart-temp').addClass("hide");
                    $('.main-table-addCart').removeClass("show");
                    $('.main-table-addCart-temp').removeClass("show");
                });
                $('.btn-continue').click(function() {
                    $('.main-table-addCart').addClass("hide");
                    $('.main-table-addCart-temp').addClass("hide");
                    $('.main-table-addCart').removeClass("show");
                    $('.main-table-addCart-temp').removeClass("show");
                });
            }
        });

    });
    $('.nav-child-full').hover(function() {
        // over
        $('.background-black').css({ "display": "block" });
        $('.background-black').addClass('black');
        clearTimeout(myVar);
    }, function() {
        // out
        $('.background-black').removeClass('black');
        myVar = setTimeout(() => {
            $('.background-black').css({ "display": "none" });
            console.log("1");
        }, 500);
    });

    $("#back-to-top").click(function() {
        return $("body, html").animate({ scrollTop: 0 }, 400), !1
    });

}, false)