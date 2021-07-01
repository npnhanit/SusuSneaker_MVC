$(document).ready(function() {
    var checkUsername = false;
    $("#formRegister").submit(function() {
        var result = checkregister();
        return result;
    });
    var check = 0;
    $('#phoneRegister').change(function() {
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $(this).val();
        $('.error').html('');
        if (mobile !== '') {
            if (vnf_regex.test(mobile) == false) {
                $('.error').append('*Số điện thoại của bạn không đúng định dạng');
            } else {
                $('.error').html('');
                check++;
            }
        } else {
            $('.error').append('*Bạn chưa nhập số điện thoại');
        }
    });
    $('#username').keyup(function() {
        var username = $(this).val();
        $.post("../../../../SusuSneaker/Ajax/checkUserName", {
                userName: username
            },
            function(data) {
                if (data == 'Tên đăng nhập đã tồn tại') {
                    $('.error').html('');
                    $('.error').append('&emsp;*' + data);
                } else {
                    $('.error').html('');
                    check++;
                    checkUsername = true;
                }
            });
    })
    $('#password').change(function() {
        var pass = $(this).val();
        if (pass.length < 6) {
            $('.error').html('');
            $('.error').append('*Mật khẩu phải ít nhất 6 kí tự');
        } else {

            $('.error').html('');
            check++;
        }
    })
    $('#confirmpassword').keyup(function() {
        var confirmpassword = $(this).val();
        var password = $('#password').val();
        if (confirmpassword == password) {
            $('.error').html('');
            check++;
        } else {
            $('.error').html('');
            $('.error').append('*Mật khẩu không khớp');
        }
    })

    function checkregister() {
        var result = 0;
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $('#phoneRegister').val();
        $('.error').html('');
        if (mobile !== '') {
            if (vnf_regex.test(mobile) == false) {
                $('.error').append('*Số điện thoại của bạn không đúng định dạng');
            } else {
                $('.error').html('');
                result++;
            }
        } else {
            $('.error').append('*Bạn chưa nhập số điện thoại');
        }
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
        var confirmpassword = $('#confirmpassword').val();
        var password = $('#password').val();
        if (confirmpassword == password) {

            $('.error').html('');
            result++;
        } else {
            $('.error').html('');
            $('.error').append('*Mật khẩu không khớp');
        }
        if (result == 4)
            return true;
        else return false;
    }
    var dataProvince;
    var dataDistrict;
    var dataWard;
    $.ajax("../../../../SusuSneaker/Ajax/getProvince", {
        type: 'POST',
        dataType: 'json',
        data: {},
        success: function(data) {
            dataProvince = data;
            for (let i in data.nameProvince) {
                $('.province-register').append("<option value='" + data.nameProvince[i] + "'>" + data.nameProvince[i] + "</option>");
            }
            $('.province-register').val('');
            $('.district-register').val('');
            $('.district-register').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>');
            $('.ward-register').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');


        },
        error: function(data) {
            console.log(data);
        }
    });
    $('.province-register').change(function() {
        var nameProvince = $('.province-register').val();
        $('.district-register').empty();
        for (let i in dataProvince.nameProvince) {
            if (dataProvince.nameProvince[i] == nameProvince)
                var idProvince = dataProvince.idProvince[i];
        }
        $.ajax("../../../../SusuSneaker/Ajax/getDistrict", {
            type: 'POST',
            dataType: 'json',
            data: {
                idProvince: idProvince
            },
            success: function(data) {
                dataDistrict = data;
                for (let i in data.nameDistrict) {
                    $('.district-register').append("<option value='" + data.nameDistrict[i] + "'>" + data.nameDistrict[i] + "</option>");

                }
                $('.district-register').val('Chọn Quận/Huyện');
                $('.ward-register').prop('disabled', true);
                $('.ward-register').val('Chọn Xã/Phường');
                $('.district-register').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>');
                $('.ward-register').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');

            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    $('.district-register').change(function() {
        var nameDistrict = $('.district-register').val();
        $('.ward-register').empty();
        for (let i in dataDistrict.nameDistrict) {
            if (dataDistrict.nameDistrict[i] == nameDistrict)
                var idDistrict = dataDistrict.idDistrict[i];
        }
        $.ajax("../../../../SusuSneaker/Ajax/getWard", {
            type: 'POST',
            dataType: 'json',
            data: {
                idDistrict: idDistrict
            },
            success: function(data) {
                dataWard = data;
                for (let i in data.nameWard) {
                    $('.ward-register').append("<option value='" + data.nameWard[i] + "'>" + data.nameWard[i] + "</option>");
                }
                $('.ward-register').prop('disabled', false);
                $('.ward-register').val('');
                $('.ward-register').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');

            },
            error: function(data) {
                console.log(data);
            }
        });
    });
})