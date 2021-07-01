<div class="container">
    <div class="row mr-0 ml-0">
        <div class="main-pay-child-left col-md-7 offset-md-1">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#info-pay" data-toggle="tab" class="nav-link active"><i class="fas fa-map-marker-alt"></i> Thông tin thanh toán</a>
                </li>
                <li class="nav-item disabledbutton">
                    <a href="#confirm-pay" data-toggle="tab" class="nav-link"><i class="far fa-check-circle"></i> Xác nhận thanh toán</a>
                </li>
                <li class="nav-item disabledbutton">
                    <a href="#done-pay" data-toggle="tab" class="nav-link"><i class="fas fa-clipboard-check"></i> Đã đặt hàng</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="info-pay" class="tab-pane mb-5 container fade in active show">
                    <div class="info-pay-child">
                        <div class="pt-3 pb-1">
                            <h2 style="font-weight: 800 !important;">ĐỊA CHỈ GIAO HÀNG</h2>
                        </div>
                        <div class="form-group pt-4">
                            <div class="row">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <input type="text" required placeholder="" class="w-100 name-pay input-pay pl-5">
                                    <div class="text-input-pay ml-3 pl-3 pr-3 pt-1 pb-1">Họ và tên</div>
                                </div>
                                <span class="text-danger text-left col-md-9 error-name pt-1 pb-1"></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <input type="text" required placeholder="" class="w-100 phone-pay input-pay pl-5">
                                    <div class="text-input-pay ml-3 pl-3 pr-3 pt-1 pb-1">Số điện thoại</div>
                                </div>
                                <span class="text-danger text-left col-md-9 error-phone pt-1 pb-1"></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <input type="text" required placeholder="" class="w-100 address-pay input-pay pl-5">
                                    <div class="text-input-pay ml-3 pl-3 pr-3 pt-1 pb-1">Số nhà/Đường/Ấp</div>
                                </div>
                                <span class="text-danger text-left col-md-9 error-address pt-1 pb-1"></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <select required placeholder="" class="w-100 input-pay province-pay pl-5">
                                        <option value="" selected disabled hidden>Chọn Tỉnh/Thành Phố</option>
                                    </select>
                                </div>
                                <span class="text-danger text-left col-md-9 error-province pt-1 pb-1"></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <select required placeholder="" class="w-100 input-pay district-pay pl-5">
                                        <option value="" selected disabled hidden>Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <span class="text-danger text-left col-md-9 error-district pt-1 pb-1"></span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 pl-0 row-input-pay">
                                    <select required placeholder="" class="w-100 input-pay ward-pay pl-5">
                                        <option value="" selected disabled hidden>Chọn Chọn Xã/Phường</option>
                                    </select>
                                </div>
                                <span class="text-danger text-left col-md-9 error-ward pt-1 pb-1"></span>
                            </div>
                        </div>
                        <hr class='pl-0'>
                        <div class="pt-2 pb-3">
                            <h2 style="font-weight: 800 !important;">VẬN CHUYỂN</h2>
                            <div class="pt-1">
                                <p><b>Giao hàng tiêu chuẩn</b></p>
                                <p><i>*Thời gian giao hàng: Từ 5 đến 7 ngày</i></p>
                                <p><i>*Phí vận chuyển toàn quốc: 30.000<sup>đ</sup></i></p>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            <button class="btn btn-dark btn-review-pay w-50 d-flex justify-content-between">
                                <h4 class="m-0">Xem lại và đặt hàng</h4> <span class="text-rigth"><i class="fas fa-arrow-right text-light"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="confirm-pay" class="tab-pane container p-0 fade">
                    <div class="confirm-pay-child">
                        <div class="p-2 bg-img-tem pl-3 pr-3 mt-3">
                            <div class="row mt-4">
                                <div class="col-md-4 ">
                                    <h6 class="font-weight-bold m-0">Tên người nhận</h6>
                                </div>
                                <div class="col-md-8 review-name"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="font-weight-bold m-0">Số điện thoại</h6>
                                </div>
                                <div class="col-md-8 review-phone"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="font-weight-bold m-0">Địa chỉ nhận hàng</h6>
                                </div>
                                <div class="col-md-8 review-address"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-6 font-weight-bold d-flex justify-content-between">
                                    <h5><b>Tổng tiền thanh toán</b></h5>
                                    <h5 class="sum-money"><b></b></h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 ">
                                <h5 class="font-weight-bold">HÌNH THỨC THANH TOÁN</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pl-5">
                                <i>Thanh toán khi nhận hàng</i>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center mt-5">
                            <button class="btn btn-dark btn-confirm-pay w-25 d-flex justify-content-between">
                                <h4 class="m-0">Đặt hàng</h4> <span class="text-rigth"><i class="fas fa-arrow-right text-light"></i></span>
                            </button>
                        </div>
                    </div>

                </div>
                <div id="done-pay" class="tab-pane containter fade">
                    <div class="done-pay-child">
                        <div class="mt-5 bg-success-outline">
                            <div class=" d-flex flex-md-row justify-content-center">
                                <img src="../../../../SusuSneaker/public/image/helper/success.png" class="m-auto w-25" alt="">
                            </div>
                            <div class='m-auto pt-2'>
                                <div class='text-center'>
                                    <h4 class="result-order text-center text-secondary">Đơn hàng của bạn đã được đặt thành công</h4>
                                    <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted text-center font-italic'>
                                        <h6>Trang chủ</h6>
                                    </a>
                                    <a href='../../../../SusuSneaker/Product/User/Order/46' class='text-muted text-center font-italic follow-order'>
                                        <h6>Theo dõi đơn hàng</h6>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-pay-child-right col-md-4 mt-5 mb-5">
            <div class="bg-main p-2">
                <h3 class='text-center' style="font-weight: 800 !important;">TÓM TẮT ĐƠN HÀNG</h3>
                <div class="p-2 bg-light">
                    <div class="text-left pl-3">
                        <h4><span class="count-item-pay font-weight-bold"></span></h4>
                    </div>
                    <hr class="m-2">
                    <div class="d-flex justify-content-between">
                        <div class="pl-5">Tổng tiền sản phẩm</div>
                        <div class="pr-2 total-price-item"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="pl-5">Phí vận chuyển</div>
                        <div class="pr-2"><?php echo number_format("30000") ?><sup>đ</sup></div>
                    </div>
                    <hr class="m-2">
                    <div class="text-left pl-3 d-flex justify-content-between">
                        <h4><span class="font-weight-bold">Tổng tiền</span></h4>
                        <div class="pr-2 total-price"></div>
                    </div>
                    <hr>
                    <div class="font-weight-bold text-center p-3">Sản phẩm</div>
                    <div class="item-pay">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loading" class="flex-row justify-content-center align-items-center" style="display:none">
    <img src="../../../../SusuSneaker/public/image/helper/loading.gif" alt="Loading..." />
    <strong>Loading...</strong>
</div>
<script>
    for (let i = 0; i < $('.row-input-pay').length; i++) {
        $('.row-input-pay').get(i).addEventListener('focusin', function() {
            $($('.text-input-pay').get(i)).addClass('move-text-input');
        })
        $('.row-input-pay').get(i).addEventListener('focusout', function() {
            if ($($('.input-pay').get(i)).val() == '')
                $($('.text-input-pay').get(i)).removeClass('move-text-input');
        })
    }
    $(document).ready(function(e) {
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
                    $('.province-pay').append("<option value='" + data.nameProvince[i] + "'>" + data.nameProvince[i] + "</option>");
                }
                $('.district-pay').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>');
                $('.ward-pay').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');
            },
            error: function(data) {
                console.log(data);
            }
        });
        $('.province-pay').change(function() {
            var nameProvince = $('.province-pay').val();
            $('.district-pay').empty();
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
                        $('.district-pay').append("<option value='" + data.nameDistrict[i] + "'>" + data.nameDistrict[i] + "</option>");
                    }
                    $('.district-pay').val('Chọn Quận/Huyện');
                    $('.ward-pay').prop('disabled', true);
                    $('.ward-pay').val('Chọn Xã/Phường');
                    $('.district-pay').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Quận/Huyện</option>');
                    $('.ward-pay').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');

                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $('.district-pay').change(function() {
            var nameDistrict = $('.district-pay').val();
            $('.ward-pay').empty();
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
                        $('.ward-pay').append("<option value='" + data.nameWard[i] + "'>" + data.nameWard[i] + "</option>");
                    }
                    $('.ward-pay').prop('disabled', false);
                    $('.ward-pay').val('');
                    $('.ward-pay').append('<option value="" class="input-text select-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>');
            
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        var count_item = 0;
        var total_item = 0;
        if (window.localStorage.getItem('cart')) {
            var obj_cart = new Object();
            obj_cart = JSON.parse(window.localStorage.getItem('cart'));
            // window.localStorage.removeItem('cart');
            for (let i in obj_cart.item) {
                if (obj_cart.item[i] == null) continue;
                $.ajax("../../../../SusuSneaker/Ajax/getItemPay", {
                    async: false,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        mshh: obj_cart.item[i].mshh
                    },
                    success: function(data) {
                        count_item++;
                        total_item += obj_cart.item[i].amount * data.Gia[0];
                        $('.item-pay').append(`
                            <a href="../../../../SusuSneaker/Product/Detail/` + obj_cart.item[i].mshh + `" class="row">
                                <div class="col-md-4 d-flex flex-row justify-content-center align-items-center image-item-pay">
                                    <img src="` + data.srcHinh[0] + `" class="w-100" alt="">
                                </div>
                                <div class="col-md-8 pl-0">
                                    <div class="text-left overflow-hidden"><strong>` + data.TenHH[0] + `</strong></div>
                                    <div class="text-left">Size ` + obj_cart.item[i].size + `</div>
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-md-6 offset-md-6 d-flex justify-content-between">
                                    <div class="">` + obj_cart.item[i].amount + ` x</div>
                                    <div class="">` + Number((data.Gia[0])).toLocaleString() + "<sup>đ</sup>" + `</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-6 d-flex justify-content-between">
                                    <div class=""><b>Tổng</b></div>
                                    <div class="">` + Number((obj_cart.item[i].amount * data.Gia[0]).toFixed(1)).toLocaleString() + "<sup>đ</sup>" + `</div>
                                </div>
                            </div>
                            <hr>
                        `);
                        // console.log(data);
                        // console.log(data.MSHH[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        } else {
            console.log("Not find key");
        }
        $('.count-item-pay').append(count_item + " sản phẩm");
        $('.total-price-item').append(Number((total_item).toFixed(1)).toLocaleString() + "<sup>đ</sup>");
        $('.total-price').append(Number((total_item + 30000).toFixed(1)).toLocaleString() + "<sup>đ</sup>");


        $('.phone-pay').change(function() {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('.phone-pay').val();
            $('.error-phone').html('');
            if (mobile !== '') {
                if (vnf_regex.test(mobile) == false) {
                    $('.error-phone').append('*Số điện thoại của bạn không đúng định dạng');
                } else {
                    $('.error-phone').html('');
                }
            } else {
                $('.error-phone').append('*Bạn chưa nhập số điện thoại');
            }
        });
        $('.name-pay').change(function() {
            var name = $('.name-pay').val();
            if (name != '') {
                $('.error-name').html('');
            }
        })
        $('.address-pay').change(function() {
            var address = $('.address-pay').val();
            if (address != '') {
                $('.error-address').html('');
            }
        })
        $('.province-pay').change(function() {
            var province = $('.province-pay').val();
            if (province != '') {
                $('.error-province').html('');
            }
        })
        $('.district-pay').change(function() {
            var district = $('.district-pay').val();
            if (district != '') {
                $('.error-district').html('');
            }
        })
        $('.ward-pay').change(function() {
            var ward = $('.ward-pay').val();
            if (ward != '') {
                $('.error-ward').html('');
            }
        })
        var confirm_pay_child = document.querySelector('.confirm-pay-child');
        var done_pay_child = document.querySelector('.done-pay-child');
        $('.done-pay-child').remove();
        $('.confirm-pay-child').remove();
        var address;
        var name;
        var phone;
        var ward;
        $('.btn-review-pay').click(function() {
            name = $('.name-pay').val();
            address = $('.address-pay').val();
            var province = $('.province-pay').val();
            var district = $('.district-pay').val();
            ward = $('.ward-pay').val();
            var check = true;
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            phone = $('.phone-pay').val();
            $('.error-name').html('');
            $('.error-province').html('');
            $('.error-district').html('');
            $('.error-ward').html('');
            $('.error-phone').html('');
            $('.error-address').html('');
            if (name == '') {
                $('.error-name').append('*Bạn chưa nhập tên');
                check = false;
            }
            if (phone == '') {
                $('.error-phone').append('*Bạn chưa nhập số điện thoại');
                check = false;
            } else {
                if (vnf_regex.test(phone) == false) {
                    $('.error-phone').append('*Số điện thoại của bạn không đúng định dạng');
                    check = false;
                }
            }
            if (province == null) {
                $('.error-province').append("*Bạn chưa chọn tỉnh/thành");
                check = false;
            }
            if (address == '') {
                $('.error-address').append("*Bạn chưa nhập địa chỉ");
                check = false;
            }
            if (district == null) {
                $('.error-district').append("*Bạn chưa chọn quận/huyện");
                check = false;
            }
            if (ward == null) {
                $('.error-ward').append("*Bạn chưa chọn xã/phường");
                check = false;
            }
            console.log(obj_cart);
            if (check === true) {
                $('#back-to-top').trigger('click');
                $($('.nav-link').get(0)).removeClass('active show');
                $($('.nav-item').get(1)).removeClass('disabledbutton');
                $($('.nav-link').get(1)).addClass('active show');
                $($('.tab-pane').get(0)).removeClass('in active show');
                $($('.tab-pane').get(1)).addClass('in active show');
                $('#confirm-pay').append(confirm_pay_child);
                $('.review-name').html('');
                $('.review-phone').html('');
                $('.review-address').html('');
                $('.sum-money').html('');
                $('.review-name').append(name);
                $('.review-phone').append(phone);
                $('.review-address').append(address + ', ' + ward + ', ' + district + ', ' + province);
                $('.sum-money').append(Number((total_item + 30000).toFixed(1)).toLocaleString() + "<sup>đ</sup>");
                $('.btn-confirm-pay').click(function() {
                    $.ajax("../../../../SusuSneaker/Ajax/addOrder", {
                        async: false,
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            idUser: <?php echo $_SESSION['idKH']; ?>,
                            address: address,
                            fullName: name,
                            phone: phone,
                            nameWard: ward,
                            obj_cart: obj_cart
                        },
                        success: function(data) {
                            console.log(data);
                            $($('.nav-item').get(0)).addClass('disabledbutton');
                            $($('.nav-item').get(1)).addClass('disabledbutton');
                            $($('.nav-item').get(2)).removeClass('disabledbutton');
                            $($('.nav-link').get(0)).removeClass('active show');
                            $($('.nav-link').get(1)).removeClass('active show');
                            $($('.nav-link').get(2)).addClass('active show');
                            $($('.tab-pane').get(0)).removeClass('in active show');
                            $($('.tab-pane').get(1)).removeClass('in active show');
                            $($('.tab-pane').get(2)).addClass('in active show');
                            $('.confirm-pay-child').remove();
                            $('.info-pay-child').remove();
                            $('#done-pay').append(done_pay_child);
                            if (data == "1") {
                                $('.result-order').html('Đơn hàng của bạn được đặt thành công');
                                window.localStorage.removeItem('cart');
                            } else {
                                $('.result-order').html('Hệ thống đang bảo trì, mời bạn liên hệ người quản trị');
                                $('.follow-order').remove();
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                })
            }
        });
        $($('.nav-item').get(0)).click(function() {
            $($('.nav-link').get(0)).addClass('active show');
            $($('.nav-item').get(1)).addClass('disabledbutton');
            $($('.nav-link').get(1)).removeClass('active show');
            $($('.tab-pane').get(0)).addClass('in active show');
            $($('.tab-pane').get(1)).removeClass('in active show');
        });
        //mskh, address, hoten, sdt, idward, [mshh, size, sl, gia]

    })
</script>