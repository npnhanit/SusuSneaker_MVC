<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Dùng edge mới nhất -->
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <!-- Reponsive trên thiết bị di đồng -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="../../../../SusuSneaker/public/css/main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="../../../../SusuSneaker/public/javascript/header.js"></script>
    <script src="../../../../SusuSneaker/public/javascript/login.js"></script>
    <script src="../../../../SusuSneaker/public/javascript/main.js"></script>
</head>

<body>
    <div id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 d-flex flex-md-column justify-content-md-center" style="z-index: 2;">
                    <div class="offset-md-1 ml-0">
                        <strong style="color:  #5F7982;">Địa chỉ liên hệ</strong> <br>
                    </div>
                    <div>
                        <i style="color:  #5F7982;" class="fas fa-phone-alt"></i> 0859969816<br>
                        <i style="color:  #5F7982;" class="fab fa-facebook-square"></i> <a href="https://www.facebook.com/profile.php?id=100027821197459">Facebook</a>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-md-column justify-content-center">

                </div>
                <div class="col-md-2 d-flex flex-md-row justify-content-center" style="z-index: 2;">
                    <a href="../../../../SusuSneaker/Home/SayHi">
                        <img width="300px" src="../../../../SusuSneaker/public/image/logo_web.png" alt="">
                    </a>
                </div>
                <div class="col-md-5 d-flex flex-md-column justify-content-md-center" style="z-index: 2;">
                    <div class="row">
                        <div class="col-md-4 offset-md-2 d-flex flex-row justify-content-end align-items-center">
                            <a class='icon-cart'><img src="../../../../SusuSneaker/public/image/helper/cart.png" style="width: 60px;" alt=""></a>
                        </div>
                        <div class="col-md-6">
                            <?php require "mvc/views/pages/" . $data['header_component'] . ".php"; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row position-absolute w-100 h-100 bg-search" style="top: 0;">
                <div class="w-100 h-100 bg-search-temp"></div>
                <div class="offset-md-2 frame-search">
                    <div class="search d-flex flex-md-row justify-content-md-start">
                        <div class="d-flex flex-md-column justify-content-md-center">
                            <button for='search' style="border-radius: 0;" class="btn search-btn btn-outline-color-main"><i style="color:  #5F7982;" class="fas fa-search"></i></button>
                        </div>
                        <input id="search" type="search" class="search-input" name="search" type="text" placeholder="Tìm kiếm">
                    </div>
                    <div class="p-1 mt-0 frame-view-search">
                        <p class="mt-3 text-center text-search"></p>
                        <div class="d-flex flex-row justify-content-center container-item-search mp-5">
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav" class="">
                <div class="row d-flex flex-md-row justify-content-md-center">
                    <div class="btn-group dropdown nav-child-full">
                        <a class="btn nav-child" href="../../../../SusuSneaker/Product/Directory/Adidas">
                            <img src="../../../../SusuSneaker/public/image/adidas_PNG23.png"></img>
                            <div>ADIDAS</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('Adidas')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/Nike" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/nike_PNG11.png"></img>
                            <div>NIKE</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('nike')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/MLB KOREA" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/mlb-logo-1.png"></img>
                            <div>MLB KOREA</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('MLB KOREA')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/Balenciaga" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/logo_balenciaga.png"></img>
                            <div>BALENCIAGA</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('balenciaga')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/Gucci" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/logo_gucci.png"></img>
                            <div>GUCCI</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('gucci')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/MCQUEEN" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/logo_MCQ.png"></img>
                            <div>MCQUEEN</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('mcqueen')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/Vans" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/vans_PNG45.png"></img>
                            <div>VANS</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('vans')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a href="../../../../SusuSneaker/Product/Directory/converse" class="btn nav-child">
                            <img src="../../../../SusuSneaker/public/image/converse_PNG51.png"></img>
                            <div>CONVERSE</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('converse')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <a href="#" class="dropdown-item end"></a>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a class="btn nav-child" href="../../../../SusuSneaker/Product/Directory/Puma">
                            <img src="../../../../SusuSneaker/public/image/puma_logo.png"></img>
                            <div>PUMA</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('puma')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <div href="#" class="dropdown-item end"></div>
                        </div>
                    </div>
                    <div class="btn-group dropdown nav-child-full">
                        <a class="btn nav-child" href="../../../../SusuSneaker/Product/Directory/Other">
                            <img src="../../../../SusuSneaker/public/image/other2.png"></img>
                            <div>SẢN PHẨM KHÁC</div>
                        </a>
                        <div class="dropdown-menu nav-child-child">
                            <?php
                            foreach ($data['json_group']->tenThuongHieu as $key => $value) {
                                if (strtoupper($value) === strtoupper('other')) {
                            ?>
                                    <a href=<?php echo '"' . '../../../../SusuSneaker/Product/GroupItems/' . strtoupper($data['json_group']->tenNhom[$key]) . '"' ?> class="dropdown-item"><?php echo $data['json_group']->tenNhom[$key]; ?></a>
                            <?php }
                            } ?>
                            <div href="#" class="dropdown-item end"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $($('.search-input')).focus(function() {
            $('.search').animate({
                width: "970px",
                top: "70px",
                position: "fixed"
            }, 500)
            $('.bg-search-temp').fadeIn();
            $('.bg-search').css("z-index", "999");
            $('.search').css("position", "fixed");
            $('.frame-view-search').animate({
                width: "970",
                height: "toggle",
                top: "85px"
            }, 500)
            $($('.search-input')).off("focus");
        })
        $($('.bg-search-temp')).click(function() {
            $('.search').animate({
                width: "150px",
                top: "50px",
                position: "absolute"
            }, 500)
            $('.bg-search-temp').fadeOut(1200);
            $('.bg-search').css("z-index", "2");
            $('.frame-view-search').animate({
                width: "150px",
                height: "toggle",
                top: "65px"
            }, 500);
            $($('.search-input')).focus(function() {
                $('.search').animate({
                    width: "970px",
                    top: "70px",
                    position: "fixed"
                }, 500)
                $('.bg-search-temp').fadeIn();
                $('.bg-search').css("z-index", "999");
                $('.frame-view-search').animate({
                    width: "970",
                    height: "toggle",
                    top: "85px"
                }, 500)
                $($('.search-input')).off("focus");
            })
            $('.search-input').prop('disabled', true);
            setTimeout(function() {
                $('.bg-search').css("z-index", "0");
                $('.search-input').prop('disabled', false);
            }, 1000)
            $('.search-input').val('');
        })
        $($('.search-btn')).click(function() {
            $('.search-input').trigger('focus');

        })
        $('#search').keyup(function() {
            var value = $(this).val();
            $.ajax({
                type: "post",
                url: "../../../../SusuSneaker/Ajax/searchItem",
                data: {
                    value: value
                },
                dataType: "json",
                success: function(data) {
                    $('.container-item-search').empty();
                    if (typeof data.MSHH != "undefined") {
                        $('.text-search').html('Kết quả tìm kiếm');
                        for (let i = 0; i < data.MSHH.length; i++) {
                            $('.container-item-search').append(`
                            <a href="../../../../SusuSneaker/Product/Detail/` + data.MSHH[i] + `" class="item-search p-2 d-flex flex-column justify-content-center w-25 fadeInDown">
                                        <div class="item-search-img m-auto pt-1 d-flex flex-row justify-content-center"><img width="200px" height="200px" src="` + data.srcHinh[i] + `" alt=""></div>
                                        <div class="item-search-name m-auto text-center font-weight-bold">` + data.TenHH[i] + `</div>
                                        <div class="item-search-price m-auto text-center font-weight-bold"><i class="fas fa-coins"></i>&#160;` + Number(data.Gia[i]).toFixed(0) + `</div>
                                    </a>
                            `)
                        }
                    } else {
                        $('.text-search').html('Không tìm thấy sản phẩm');
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
        $('.icon-cart').click(function() {
            if ($('.login_register_icon').hasClass('visitor')) {
                document.location = '../../../../SusuSneaker/Login';
                window.localStorage.setItem('prePage', "http://localhost/SusuSneaker/Product/Cart");
            } else {
                //...
                document.location = '../../../../SusuSneaker/Product/Cart';
            }
        })
    })
</script>