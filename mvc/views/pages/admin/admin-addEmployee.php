<div class="row text-center mt-3 d-flex flex-row justify-content-center" style="margin-bottom: 27px;">
    <h2 class="text-center info title-admin font-weight-bold">Thêm tài khoản nhân viên</h2>
</div>
<hr>
<span class="text-danger text-left col-md-9 erroremployee pt-1 pb-1"></span>
<span class="text-success text-left col-md-9 spanresultemployee pt-1 pb-1"></span>
<section class="get-in-touch">
    <form id="formAddEmployee-admin" action="" method="post" class="contact-form row">
        <div class="form-field col-lg-6">
            <input id="usernameemployee-admin" name="username" class="input-text js-input" type="text" required>
            <label class="label" for="username-admin">Tên đăng nhập</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="fullnameemployee-admin" class="input-text js-input" name="fullname" type="text" required>
            <label class="label" for="fullname-admin">Họ và tên</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="passwordemployee-admin" name="password" class="input-text js-input" type="password" required>
            <label class="label" for="password-admin">Mật khẩu</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="confirmpasswordemployee-admin" name="confirmpassword" class="input-text js-input" type="password" required>
            <label class="label" for="confirmpassword-admin">Nhập lại mật khẩu</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="phoneemployee-admin" name="phone" class="input-text js-input" type="text" required>
            <label class="label" for="phoneRegister-admin">Số điện thoại</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="addressemployee-admin" class="input-text js-input" name="address" type="text" required>
            <label class="label" for="address-admin">Địa chỉ</label>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="province" class="w-100 input-text select-text province-register pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Tỉnh/Thành Phố</option>
            </select>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="district" class="w-100 input-text select-text district-register pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>
            </select>
        </div>
        <div class="form-field col-lg-6">
            <select required placeholder="" name="ward" class="w-100 input-text select-text ward-register pl-1">
                <option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>
            </select>
        </div>
        <div class="form-field col-lg-12 d-flex flex-row justify-content-center">
            <input class="submit-btn btn-register" name="register" type="submit" value="Tạo tài khoản nhân viên">
        </div>
        <hr>
    </form>
</section>
<script>
    $(document).ready(function() {
        var checkUsername = false;
        $("#formAddEmployee-admin").submit(function() {
            var result = checkregister();
            if (result == true) {
                var formData = new FormData(document.getElementById("formAddEmployee-admin"));
                $.ajax({
                    type: "POST",
                    data: formData,
                    url: "../../../../SusuSneaker/Ajax/addEmployee",
                    contentType: false,
                    processData: false,
                    headers: {
                        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function(data) {
                        if (data == 'Thêm nhân viên thành công') {
                            $('.erroremployee').html('');
                            $('.spanresultemployee').html(data);
                            $('#formAddEmployee-admin').trigger("reset");
                            return false;
                        } else {
                            $('.erroremployee').html(data);
                            $('#formAddEmployee-admin').trigger("reset");
                            return false;
                        }
                    },
                    error: function(data) {
                        $('.erroremployee').html(data);
                        $('#formAddEmployee-admin').trigger("reset");
                        return false;
                    }
                });
            } else {
                $('.erroremployee').html('*Biểu mẫu không hợp lệ');
                return false;
            }
            return false;
        });
        var check = 0;
        $('#phoneemployee-admin').keyup(function() {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $(this).val();
            $('.erroremployee').html('');
            if (mobile !== '') {
                if (vnf_regex.test(mobile) == false) {
                    $('.erroremployee').append('*Số điện thoại của bạn không đúng định dạng');
                } else {
                    $('.erroremployee').html('');
                    check++;
                }
            } else {
                $('.erroremployee').append('*Bạn chưa nhập số điện thoại');
            }
        });
        $('#usernameemployee-admin').keyup(function() {
            var username = $(this).val();
            $.post("../../../../SusuSneaker/Ajax/checkUserName", {
                    userName: username
                },
                function(data) {
                    if (data == 'Tên đăng nhập đã tồn tại') {
                        $('.erroremployee').html('');
                        $('.erroremployee').append('&emsp;*' + data);
                    } else {
                        $('.erroremployee').html('');
                        check++;
                        checkUsername = true;
                    }
                });
        })
        $('#passwordemployee-admin').change(function() {
            var pass = $(this).val();
            if (pass.length < 6) {
                $('.erroremployee').html('');
                $('.erroremployee').append('*Mật khẩu phải ít nhất 6 kí tự');
            } else {

                $('.erroremployee').html('');
                check++;
            }
        })
        $('#confirmpasswordemployee-admin').keyup(function() {
            var confirmpassword = $(this).val();
            var password = $('#passwordemployee-admin').val();
            if (confirmpassword == password) {
                $('.erroremployee').html('');
                check++;
            } else {
                $('.erroremployee').html('');
                $('.erroremployee').append('*Mật khẩu không khớp');
            }
        })

        function checkregister() {
            var result = 0;
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('#phoneemployee-admin').val();
            $('.erroremployee').html('');
            if (mobile !== '') {
                if (vnf_regex.test(mobile) == false) {
                    $('.erroremployee').append('*Số điện thoại của bạn không đúng định dạng');
                } else {
                    $('.erroremployee').html('');
                    result++;
                }
            } else {
                $('.erroremployee').append('*Bạn chưa nhập số điện thoại');
            }
            console.log(result);
            if (checkUsername) {
                result++;
            }
            var pass = $('#passwordemployee-admin').val();
            if (pass.length < 6) {
                $('.erroremployee').html('');
                $('.erroremployee').append('*Mật khẩu phải ít nhất 6 kí tự');
            } else {

                $('.erroremployee').html('');
                result++;
            }
            var confirmpassword = $('#confirmpasswordemployee-admin').val();
            var password = $('#passwordemployee-admin').val();
            if (confirmpassword == password) {

                $('.erroremployee').html('');
                result++;
            } else {
                $('.erroremployee').html('');
                $('.erroremployee').append('*Mật khẩu không khớp');
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
                    $('.province-register').append("<option value='" + data.nameProvince[i] + "'>" + data.nameProvince[i] + "</option>");
                }
                // $('.province-register').val('');
                // $('.district-register').val('');
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
                    $('.district-register').val('');
                    $('.ward-register').prop('disabled', true);
                    $('.ward-register').val('');
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
</script>