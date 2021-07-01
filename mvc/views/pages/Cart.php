<div class="main-cart container-fuild">
    <div class="row mr-0 ml-0">
        <div class="main-child-left col-md-8 offset-md-1">
            <div class="row">
                <div class="text-left p-3 col-md-12 text-center">
                    <h1 class="font-weight-bold">GIỎ HÀNG CỦA BẠN <span class="count-item-cart font-italic font-weight-light"></span></h1>
                </div>
                <?php
                if ($data['json_groupCart']) {
                    foreach ($data['json_groupCart']->tenNhom as $key => $value) {
                ?>
                        <fieldset class="col-md-12 mb-5">
                            <legend class="legend-cart w-25 text-left">
                                <h4 class="text-center"><?php echo $value; ?></h4>
                            </legend>
                            <?php
                            foreach ($data['json_itemCart']->tenNhom as $key1 => $value1) {
                                if ($value1 == $value) {
                            ?>
                                    <div class="row mb-3">
                                        <div class="col-md-1 d-flex flex-column justify-content-center">
                                            <div class="form-check d-flex flex-row justify-content-center">
                                                <input type="checkbox" data-size="<?php echo $data['json_itemCart']->size[$key1]; ?>" data-MSHH="<?php echo $data['json_itemCart']->MSHH[$key1] ?>" data-price="<?php echo $data['json_itemCart']->Gia[$key1] * $data['json_itemCart']->soLuong[$key1]; ?>" data-soLuong="<?php echo $data['json_itemCart']->soLuong[$key1]; ?>" class="form-check-input check-box-item_cart">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_itemCart']->MSHH[$key1]; ?>">
                                                <img src="<?php echo $data['json_itemCart']->srcHinh[$key1]; ?>" class="w-100 img-fluid img-thumbnail" alt="">
                                            </a>

                                        </div>
                                        <div class="col-md-5">
                                            <a class="d-flex flex-column justify-content-center" href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_itemCart']->MSHH[$key1]; ?>">
                                                <strong><?php echo $data['json_itemCart']->TenHH[$key1]; ?></strong>
                                                <i>
                                                    <h6 class="text-secondary">Size <?php echo $data['json_itemCart']->size[$key1]; ?></h6>
                                                </i>
                                            </a>

                                        </div>

                                        <div class="col-md-4 d-flex flex-column justify-content-center text-center">
                                            <strong><?php echo number_format($data['json_itemCart']->Gia[$key1]) . "<sup>đ</sup> &#160; x &#160;"; ?>
                                                <div class="form-group m-0 d-inline-block" style="width:20%;">
                                                    <select class="form-control select-size-cart" data-size="<?php echo $data['json_itemCart']->size[$key1]; ?>" data-MSHH="<?php echo $data['json_itemCart']->MSHH[$key1] ?>">
                                                        <?php
                                                        foreach ($data['json_remainAmountItemCart']->MSHH as $key3 => $value3) {
                                                            if ($value3 == $data['json_itemCart']->MSHH[$key1] && $data['json_remainAmountItemCart']->size[$key3] == $data['json_itemCart']->size[$key1]) {
                                                                $remainItem = $data['json_remainAmountItemCart']->soLuong[$key3];
                                                            }
                                                        }
                                                        for ($i = 1; $i <= $remainItem; $i++) {
                                                            if ($i == $data['json_itemCart']->soLuong[$key1]) {
                                                        ?>
                                                                <option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php
                                                                continue;
                                                            }
                                                            ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </>

                                                </select>
                                        </div>
                                        <span class=""><?php echo '&#160; &#160;' . number_format($data['json_itemCart']->Gia[0] * $data['json_itemCart']->soLuong[$key1]) . "<sup>đ</sup>"; ?></span>
                                        </strong>
                                        <div class="text-center"><button data-size="<?php echo $data['json_itemCart']->size[$key1]; ?>" data-MSHH="<?php echo $data['json_itemCart']->MSHH[$key1] ?>" class="btn btn-danger text-center mt-3 w-50 btn-delete-item-cart"><i class="far fa-trash-alt"></i></button></div>
                                    </div>
            </div>
            <hr>
    <?php
                                }
                            }
    ?>
    </fieldset>
<?php
                    }
                } else {
                    echo "<div class='m-auto pt-5'>
                        <h4 class='text-center text-secondary dont-weight-bold'>Không có sản phẩm nào trong giỏ hàng
                         <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'><h6>Trang chủ</h6></a>
                        </h4>
                        
                    </div>";
                }
?>
        </div>
    </div>
    <div class="main-child-right col-md-3 pt-3 pb-3">
        <div class="bg-main">
            <div class="bg-main p-2">
                <button class="btn btn-dark btn-pay w-100 d-flex justify-content-between">
                    <h4 class="m-0">THANH TOÁN</h4> <span class="text-rigth"><i class="fab fa-amazon-pay fa-2x text-light"></i></span>
                </button>
            </div>
            <div class="text-center text-dark font-weight-bold">TÓM TẮT ĐƠN HÀNG</div>
            <div class=" pt-1 p-2 bg-main">
                <div class="bg-light">
                    <div class="text-left pl-3">
                        <h4><span class="count-item-pay font-weight-bold"></span></h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="pl-5">Tổng tiền gốc</div>
                        <div class="pr-2 totle-price-item"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="pl-5">Giảm giá</div>
                        <div class="pr-2 discount-price-pay"></div>
                    </div>
                    <hr class="m-2">
                    <div class="d-flex justify-content-between">
                        <div class="pl-3 font-weight-bold">Tổng tiền sản phẩm</div>
                        <div class="pr-2 sum-price-item-discount"></div>
                    </div>
                    <hr class="m-2">
                    <div class="d-flex justify-content-between">
                        <div class="pl-3 font-weight-bold">Ship</div>
                        <div class="pr-2"><?php echo number_format("30000") ?><sup>đ</sup></div>
                    </div>
                    <hr class="m-2">
                    <div class="d-flex justify-content-between">
                        <div class="pl-3 font-weight-bold">
                            <h5 class="font-weight-bold">TỔNG TIỀN</h5>
                        </div>
                        <div class="pr-2 totle-pay"></div>
                    </div>
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
    $(document).ready(function() {
        $.ajax("../../../../SusuSneaker/Ajax/countItemCart", {
            type: 'POST',
            dataType: 'html',
            data: {
                idUser: <?php echo $_SESSION['idKH']; ?>
            },
            success: function(data) {
                $('.count-item-cart').html("Có " + data + " sản phẩm")
            },
            error: function(data) {
                console.log(data);
            }
        });
    })
    for (let i = 0; i < $('.select-size-cart').length; i++) {
        $('.select-size-cart').get(i).addEventListener('change', function(event) {
            event.preventDefault();
            console.log($('.select-size-cart').get(i));
            $.ajax("../../../../SusuSneaker/Ajax/updateCart", {
                type: 'POST',
                dataType: 'html',
                data: {
                    idUser: <?php echo $_SESSION['idKH']; ?>,
                    mshh: $($('.select-size-cart').get(i)).attr('data-MSHH'),
                    size: $($('.select-size-cart').get(i)).attr('data-size'),
                    soLuong: $($('.select-size-cart').get(i)).val()
                },
                success: function(data) {
                    location.reload();   
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
    }
    for (let i = 0; i < $('.btn-delete-item-cart').length; i++) {
        $('.btn-delete-item-cart').get(i).addEventListener('click', function(event) {
            event.preventDefault();
            $.ajax("../../../../SusuSneaker/Ajax/deleteItemCart", {
                type: 'POST',
                dataType: 'html',
                data: {
                    idUser: <?php echo $_SESSION['idKH']; ?>,
                    mshh: $($('.btn-delete-item-cart').get(i)).attr('data-MSHH'),
                    size: $($('.btn-delete-item-cart').get(i)).attr('data-size'),
                    soLuong: $($('.btn-delete-item-cart').get(i)).val()
                },
                success: function(data) {
                    // console.log(data);
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
    }
    var totle_price_item = 0;
    var count_item = 0;
    var discount_price_pay = 0;
    var ship = 30000;
    var sum_price_item_discount = 0;
    var totle_pay = 0;
    var cart = {
        item: []
    };
    var count = 0;
    $('.btn-pay').attr('disabled', true);
    $('.count-item-pay').html("Có " + count_item + " sản phẩm được chọn");
    $('.totle-price-item').html(Number(totle_price_item.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
    $('.discount-price-pay').html(Number(discount_price_pay.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
    $('.sum-price-item-discount').html(Number(sum_price_item_discount.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
    $('.totle-pay').html(Number(totle_pay.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
    for (let i = 0; i < $('.check-box-item_cart').length; i++) {
        $(".check-box-item_cart").get(i).addEventListener('click', function(event) {
            var mshh = parseInt($($('.check-box-item_cart').get(i)).attr('data-MSHH'));
            var size = parseInt($($('.check-box-item_cart').get(i)).attr('data-size'));
            var amount = parseInt($($('.check-box-item_cart').get(i)).attr('data-soLuong'));
            var price = parseInt($($('.check-box-item_cart').get(i)).attr('data-price'));
            var array = {
                mshh: mshh,
                size: size,
                amount: amount,
                price: price
            };
            if ($($(".check-box-item_cart").get(i)).prop("checked") == true) {
                totle_price_item += parseInt($($('.check-box-item_cart').get(i)).attr('data-price'));
                count_item++;
                cart.item.push(array);
                console.log(cart.item[0]);
            } else if ($($(".check-box-item_cart").get(i)).prop("checked") == false) {
                totle_price_item -= parseInt($($('.check-box-item_cart').get(i)).attr('data-price'));
                count_item--;
                cart.item.forEach(function(value, key, array) {
                    if (cart.item[key].mshh == mshh && cart.item[key].size == size && cart.item[key].amount == amount) {
                        delete cart.item[key];
                    }
                })
            }
            console.log(cart);
            sum_price_item_discount = totle_price_item - discount_price_pay;
            totle_pay = sum_price_item_discount + ship;
            $('.count-item-pay').html("Có " + count_item + " sản phẩm được chọn");
            $('.totle-price-item').html(Number(totle_price_item.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
            $('.discount-price-pay').html(Number(discount_price_pay.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
            $('.sum-price-item-discount').html(Number(sum_price_item_discount.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
            if (count_item == 0) {
                $('.btn-pay').attr('disabled', true);
                totle_pay = 0;
            } else {
                $('.btn-pay').attr('disabled', false);
            }
            $('.totle-pay').html(Number(totle_pay.toFixed(1)).toLocaleString() + "<sup>đ</sup>");
        })
    }
    $('.btn-pay').click(function(){
        localStorage.setItem('cart', JSON.stringify(cart));
        window.location = '../../../../SusuSneaker/Product/Pay';
    })
</script>