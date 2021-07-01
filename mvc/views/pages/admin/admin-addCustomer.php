<div class="row text-center mt-3 d-flex flex-row justify-content-center" style="margin-bottom: 27px;">
    <h2 class="text-center info title-admin font-weight-bold">Thêm tài khoản khách hàng</h2>
</div>
<hr>
<span class="text-danger text-left col-md-9 error pt-1 pb-1"></span>
<span class="text-success text-left col-md-9 spanresult pt-1 pb-1"></span>
<section class="get-in-touch">
    <form id="formRegister-admin" action="" method="post" class="contact-form row">
        <div class="form-field col-lg-6">
            <input id="username-admin" name="username" class="input-text js-input" type="text" required>
            <label class="label" for="username-admin">Tên đăng nhập</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="fullname-admin" class="input-text js-input" name="fullname" type="text" required>
            <label class="label" for="fullname-admin">Họ và tên</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="password-admin" name="password" class="input-text js-input" type="password" required>
            <label class="label" for="password-admin">Mật khẩu</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="confirmpassword-admin" name="confirmpassword" class="input-text js-input" type="password" required>
            <label class="label" for="confirmpassword-admin">Nhập lại mật khẩu</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="phoneRegister-admin" name="phone" class="input-text js-input" type="text" required>
            <label class="label" for="phoneRegister-admin">Số điện thoại</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="address-admin" class="input-text js-input" name="address" type="text" required>
            <label class="label" for="address-admin">Địa chỉ</label>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="province" class="w-100 input-text select-text province-customer pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Tỉnh/Thành Phố</option>
            </select>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="district" class="w-100 input-text select-text district-customer pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>
            </select>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="ward" class="w-100 input-text select-text ward-customer pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>
            </select>
        </div>
        <div class="form-field col-lg-12 d-flex flex-row justify-content-center">
            <input class="submit-btn btn-register" name="register" type="submit" value="Tạo tài khoản khách hàng">
        </div>
        <hr>
    </form>
</section>
<script>
    $(document).ready(function() {
        var checkUsername = false;
        $("#formRegister-admin").submit(function() {
            var result = checkregister();
            if (result == true) {
                var formData = new FormData(document.getElementById("formRegister-admin"));
                $.ajax({
                    type: "POST",
                    data: formData,
                    url: "../../../../SusuSneaker/Ajax/addCustomer",
                    contentType: false,
                    processData: false,
                    headers: {
                        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function(data) {
                        if (data == 'Thêm khách hàng thành công') {
                            $('.error').html('');
                            $('.spanresult').html(data);
                            $('#formRegister-admin').trigger("reset");
                            return false;
                        } else {
                            $('.error').html(data);
                            $('#formRegister-admin').trigger("reset");
                            return false;
                        }
                    },
                    error: function(data) {
                        $('.error').html(data);
                        $('#formRegister-admin').trigger("reset");
                        return false;
                    }
                });
            }else{
                $('.error').html('*Biểu mẫu không hợp lệ');
                return false;
            }
            return false;
        });
        var check = 0;
        $('#phoneRegister-admin').keyup(function() {
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
        $('#username-admin').keyup(function() {
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
        $('#password-admin').change(function() {
            var pass = $(this).val();
            if (pass.length < 6) {
                $('.error').html('');
                $('.error').append('*Mật khẩu phải ít nhất 6 kí tự');
            } else {

                $('.error').html('');
                check++;
            }
        })
        $('#confirmpassword-admin').keyup(function() {
            var confirmpassword = $(this).val();
            var password = $('#password-admin').val();
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
            var mobile = $('#phoneRegister-admin').val();
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
            console.log(result);
            if (checkUsername) {
                result++;
            }
            console.log(result);
            var pass = $('#password-admin').val();
            if (pass.length < 6) {
                $('.error').html('');
                $('.error').append('*Mật khẩu phải ít nhất 6 kí tự');
            } else {

                $('.error').html('');
                result++;
            }
            console.log(result);
            var confirmpassword = $('#confirmpassword-admin').val();
            var password = $('#password-admin').val();
            if (confirmpassword == password) {

                $('.error').html('');
                result++;
            } else {
                $('.error').html('');
                $('.error').append('*Mật khẩu không khớp');
            }
            console.log(result);
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
                    $('.province-customer').append("<option value='" + data.nameProvince[i] + "'>" + data.nameProvince[i] + "</option>");
                }
                // $('.province-customer').val('');
                // $('.district-customer').val('');
            },
            error: function(data) {
                console.log(data);
            }
        });
        $('.province-customer').change(function() {
            var nameProvince = $('.province-customer').val();
            $('.district-customer').empty();
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
                        $('.district-customer').append("<option value='" + data.nameDistrict[i] + "'>" + data.nameDistrict[i] + "</option>");
                    }
                    $('.district-customer').val('');
                    $('.ward-customer').prop('disabled', true);
                    $('.ward-customer').val('');
                    $('.district-customer').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>');
                    $('.ward-customer').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $('.district-customer').change(function() {
            var nameDistrict = $('.district-customer').val();
            $('.ward-customer').empty();
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
                        $('.ward-customer').append("<option value='" + data.nameWard[i] + "'>" + data.nameWard[i] + "</option>");
                    }
                    
                    $('.ward-customer').prop('disabled', false);
                    $('.ward-customer').val('');
                    $('.ward-customer').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');
                
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    })
</script>