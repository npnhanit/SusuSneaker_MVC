document.addEventListener("DOMContentLoaded", function() {
        // $(document).ready(function() {
        //     $('.login-text').click(function(e) {
        //         e.preventDefault();
        //         $('.manden').removeClass('hideformlogin');
        //         $('.loginform').removeClass('hideformlogin');

        //         $('#login').removeClass('an');
        //         $('#registration').addClass('an');
        //         $('.buttonlogin').addClass('maulogin');
        //         $('.buttonregistration').removeClass('maulogin');
        //     });
        //     $('.registration-text').click(function(e) {
        //         e.preventDefault();
        //         $('.manden').removeClass('hideformlogin');
        //         $('.loginform').removeClass('hideformlogin');

        //         $('#login').addClass('an');
        //         $('#registration').removeClass('an');
        //         $('.buttonregistration').addClass('maulogin');
        //         $('.buttonlogin').removeClass('maulogin');

        //     });
        //     $('.button-x').click(function(e) {
        //         e.preventDefault();
        //         $('.manden').addClass('hideformlogin');
        //         $('loginform').addClass('hideformlogin');
        //         console.log('da click man den');
        //     });
        //     $('.buttonlogin').click(function(e) {
        //         e.preventDefault();
        //         $('#login').removeClass('an');
        //         $('#registration').addClass('an');
        //         $('.buttonlogin').addClass('maulogin');
        //         $('.buttonregistration').removeClass('maulogin');
        //     });
        //     $('.buttonregistration').click(function(e) {
        //         e.preventDefault();
        //         $('#login').addClass('an');
        //         $('#registration').removeClass('an');
        //         $('.buttonregistration').addClass('maulogin');
        //         $('.buttonlogin').removeClass('maulogin');
        //     });
        // })

        $(document).ready(function() {
            $("#tendangnhap").keyup(function() {
                var value = $(this).val();
                // $("#checkUserName").html(value);
                $.post("../../SusuSneaker/Ajax/checkUserName", {
                        userName: value
                    },
                    function(data) {
                        $("#checkUserName").html(data);
                    });
            });
        })

        $(document).ready(function() {
            $("#tendangnhap1").keyup(function() {
                var value = $(this).val();
                // $("#checkUserName").html(value);
                $.post("../../SusuSneaker/Ajax/checkUserName", {
                        userName: value
                    },
                    function(data) {
                        $("#checkUserName1").html(data);
                    });
            });
        })

        $(document).ready(function() {
            $("#tendangnhap2").keyup(function() {
                var value = $(this).val();
                // $("#checkUserName").html(value);
                $.post("../../SusuSneaker/Ajax/checkUserName", {
                        userName: value
                    },
                    function(data) {
                        $("#checkUserName2").html(data);

                    });
            });

        })

        var checkUserName = true;
        $("#formLogin").submit(function() {
            var result = checklogin();
            return result;
        });

        function checklogin() {
            var result = 0;
            if (checkUsername) {
                result++;
            }
            var pass = $('#password').val();
            if (pass.length < 6) {
                $('.error').html('');
                $('.error').append('*Mật khẩu phải ít nhất 6 kí tự');
            } else {
                $('.error').html('');
                result++;
            }
            if (result == 2)
                return true;
            else return false;
        }

    }, false)
    //api.jquery.com/get/