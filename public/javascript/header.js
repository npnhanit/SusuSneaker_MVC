document.addEventListener("DOMContentLoaded", function() {
    var header = document.querySelector("#header");
    var main = document.querySelector("#main");
    var height_header = header.offsetHeight; // Get height header
    var nav = document.querySelector("#nav");
    var height_nav = nav.offsetHeight;
    console.log();
    var temp = 0;
    flag = 0;
    $(document).ready(function() {
        $(window).scroll(function() { //event scroll
            var h = $('html,body').scrollTop(); //height scrolled
            if (h > temp) {
                //cuon xuong
                temp = h;
                if (h > height_header - height_nav) {
                    $('#nav').addClass('co-dinh');
                    // $('#nav').addClass('remove-co-dinh');
                    if (h > height_header) {
                        $('#nav').addClass('remove-co-dinh');
                        $('#nav').removeClass('co-dinh');
                    }
                }
            } else {
                //cuon len
                flag = 1;
                if (h > height_header - height_nav - 50) {
                    $('#nav').addClass('co-dinh');
                    $('#nav').removeClass('remove-co-dinh');
                } else {
                    $('#nav').removeClass('remove-co-dinh');
                    $('#nav').removeClass('co-dinh');
                }
                temp = h;
            }

        });
    });



}, false)