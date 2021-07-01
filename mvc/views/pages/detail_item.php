<div class="main-table-size d-flex flex-row justify-content-center align-items-center hide">
    <button class="main-table-size-temp hide"></button>
    <div class="table-size-child position-absolute overflow-auto w-50 h-75 border-4 p-2">
        <div class="text-center m-3">
            <h1>CHỌN SIZE GIÀY <?php echo strtoupper($data['infoItem']->tenThuongHieu[0]); ?></h1>
        </div>
        <hr>
        <div class="text-info text-center">
            <div class="m-3"><a href="#mete"><strong class="text-info">Cách đo chân</strong></a></div>
            <h3>Bảng chọn size</h3>
        </div>
        <div class="m-3 mb-5 overflow-auto">
            <?php require_once "mvc/views/pages/size_table/Adidas.html"; ?>
            <?php //require_once "mvc/views/pages/size_table/" . $data['infoItem']->tenThuongHieu[0] . ".html"; 
            ?>
        </div>
        <div class="m-3 mb-5">
            <h3 class="text-info">Làm gì khi độ dài chân nằm giữa hai size?</h3>
            <div class="pt-2 pl-5"><i class="far fa-hand-point-right"></i> Để vừa vặn, bạn hãy giảm một size.</div>
            <div class="pt-1 pl-5"><i class="far fa-hand-point-right"></i> Để thoải mái, bạn hãy tăng một size.</div>
        </div>
        <hr id="mete">
        <div class="m-3">
            <h3 class="text-info mb-3">Hướng dẫn đo chân</h3>
            <div class="border border-3">
                <div class="mt-1 d-flex flex-row justify-content-center">
                    <div class="thumbnail w-75">
                        <img class="w-100 m-auto img-thumbnail" src="../../../../SusuSneaker/public/image/helper/img_size.jpg" alt="">
                        <p class="text-center">Hình ảnh minh họa</p>
                    </div>
                </div>
                <div class="pl-5 pt-2 pr-5">
                    <p><b>Bước 1: </b>Đặt chân lên tờ giấy</p>
                    <p><b>Bước 2: </b>Sau đó, lấy bút vẽ theo đường xung quanh của bàn chân</p>
                    <p><b>Bước 3: </b>Nhấc chân ra khỏi tờ giấy, rồi lấy thước kẻ kẻ thẳng 2 đầu song song ở mũi chân cao nhất và phần gót chân</p>
                    <p><b>Bước 4: </b>Sau khi có số đo thì bạn trừ đi 0.5cm để trừ đi khoảng chênh lệch giữa bàn chân thực tế và chân vẽ trên giấy</p>
                    <p><b>Lưu ý: </b></p>
                    <div class="pl-5 pr5">
                        <p>– Khi đo bạn nên đo cả 2 chân bởi có chân to chân bé. Kích thước giữa 2 chân có sự chênh lệch thì nên chọn đôi giày có cỡ chân bằng với cỡ chân to của mình.</p>
                        <p>– Cần đo bàn chân vào buổi chiều. Vì sau một ngày đi lại nhiều bàn chân của bạn sẽ to hơn so với buổi sáng. Khi đo vào buổi chiều sẽ chính xác hơn và giúp bạn lựa chọn được size giày chuẩn nhất.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="main-table-addCart d-flex flex-row justify-content-center align-items-center hide">
    <button class="main-table-addCart-temp hide"></button>
    <div class="table-addCart-child position-absolute w-50 h-25 border-4 p-2">
        <div class="row h-100">
            <div class="col-md-8 border-right">
                <div class="text-center"><strong>ĐÃ THÊM VÀO GIỎ HÀNG</strong></div>
                <div class="row h-100">
                    <div class="col-md-5">
                        <div class="w-100 h-100 d-flex flex-column justify-content-center">
                            <img class="w-100" src="<?php echo $data['imgItem']->srcHinh[0]; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 p-0 d-flex flex-column justify-content-center">
                        <div class="text-left"><strong><?php echo $data['infoItem']->TenHH[0] ?></strong></div>
                        <div class="text-left"><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['infoItem']->Gia[0]); ?><sup>đ</sup> &#160; x 1</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-center" style="border-left: solid;">
                <a href="" class="d-flex flex-row justify-content-center">
                    <button class="btn btn-success w-70">
                        <h3><strong>Thanh toán <i class="fas fa-money-check"></i></strong></h3>
                    </button>
                </a>
                <a href="../../../../SusuSneaker/Product/Cart" class="d-flex flex-row justify-content-center mt-3 btn-to-cart">
                    <button class="btn btn-warning"><strong>Đi đến giỏ hàng <i class="fas fa-long-arrow-alt-right"></i><i class="fas fa-shopping-cart"></i></strong></button>
                </a>
                <div class="d-flex flex-row justify-content-center mt-3 btn-to-cart">
                    <button class="btn btn-sencondary btn-continue"><strong>Tiếp tục mua hàng <i class="fas fa-long-arrow-alt-right"></i></strong></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loading" class="flex-row justify-content-center align-items-center" style="display:none">
    <img src="../../../../SusuSneaker/public/image/helper/loading.gif" alt="Loading..." />
    <strong>Loading...</strong>
</div>
<div class="main-detail-item">
    <div class="container-fuild">
        <div class="row mr-0 ml-0">
            <div class="detail-item-component-l col-md-9 p-0">
                <div class="detail-link m-3">
                    <div>
                        <strong>
                            <a href="../../../../SusuSneaker/Home/SayHi">Trang chủ</a> /
                            <a href="../../../../SusuSneaker/Product/Directory/<?php echo $data['infoItem']->tenThuongHieu[0] ?>"><?php echo $data['infoItem']->tenThuongHieu[0] ?></a> /
                            <a href="../../../../SusuSneaker/Product/GroupItems/<?php echo $data['infoItem']->tenNhom[0] ?>"><?php echo $data['infoItem']->tenNhom[0] ?></a> /
                            <?php echo $data['infoItem']->TenHH[0] ?>
                        </strong>
                    </div>
                </div>
                <div class="detail-image">
                    <div id="detail-image-1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($data['imgItem']->srcHinh as $key => $value) { ?>
                                <li data-target="#detail-image-1" data-slide-to="<?php echo $key; ?>" class="<?php if ($key == 0) echo "active"; ?>"><img width="100px" height="50px" class="d-block w-100 h-100" src="<?php echo $value; ?>"></li>
                            <?php } ?>
                        </ol>
                        <!--Hết tạo chỉ số-->

                        <!--Các slide bên trong carousel-inner-->
                        <div class="carousel-inner">
                            <?php foreach ($data['imgItem']->srcHinh as $key => $value) { ?>
                                <div class="carousel-item <?php if ($key == 0) echo "active"; ?>">
                                    <img width="700px" height="700px" class="d-block w-75 m-auto" src="<?php echo $value; ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <!--Cho thêm khiển chuyển slide trước, sau nếu muốn-->
                        <a class="carousel-control-prev text-secondary" href="#detail-image-1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon  text-secondary" aria-hidden="true"></span> <span class="sr-only text-secondary">Previous</span></a>
                        <a class="carousel-control-next text-secondary" href="#detail-image-1" role="button" data-slide="next"> <span class="carousel-control-next-icon text-secondary" aria-hidden="true"></span> <span class="sr-only text-secondary">Next</span> </a>
                        <!--Hết tạo điều khiển chuyển Slide-->

                    </div>
                    <br>
                    <ul class="nav nav-tabs d-flex flex-row justify-content-center">
                        <li class="nav-item"><a class="nav-link active " data-toggle="tab" href="#discribe-item">MÔ TẢ SẢN PHẨM</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#coordination-clothes">GỢI Ý PHỐI ĐỒ</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="discribe-item" class="tab-pane container fade in active show">
                            <div class="well pl-5 mb-5 pt-3"><?php echo $data['infoItem']->MoTaHH[0] ?></div>
                            <?php foreach ($data['imgItem']->srcHinh as $key => $value) { ?>
                                <div class="mb-2">
                                    <img width="700px" height="700px" class="d-block w-75 m-auto" src="<?php echo $value; ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <div id="coordination-clothes" class="tab-pane container fade">
                            <div class="text-center m-3"><strong>SẢN PHẨM TƯƠNG TỰ</strong></div>
                            <div class="text-center m-3"><strong>SẢN PHẨM TƯƠNG TỰ</strong></div>
                            <div class="text-center m-3"><strong>SẢN PHẨM TƯƠNG TỰ</strong></div>
                            <div class="text-center m-3"><strong>SẢN PHẨM TƯƠNG TỰ</strong></div>
                            <div class="text-center m-3"><strong>SẢN PHẨM TƯƠNG TỰ</strong></div>

                        </div>
                    </div>
                    <hr>
                    <div class="p-4">
                        <p class="text-center"><strong>CÁCH VỆ SINH GIÀY SNEAKER</strong></p>
                        <strong>Khi vệ sinh và bảo quản giày, điều quan trọng nhất làm làm sao không làm ảnh hưởng đến chất lượng giày. Một số mẹo giặt giày của mình nè:</strong>
                        <div class="pl-5">
                            <p>• Đừng giặt giày liên tục sau mỗi lần sử dụng. Giày sẽ rất mau hư nếu bạn nhúng nước nó quá thường xuyên: bị hở keo đế, hoặc phần vật liệu thân giày bị mục.<br />
                                • Đừng giặt giày bằng máy giặt. Nếu bạn lười biếng và muốn dùng máy giặt, chỉ nên làm thế vài tháng một lần.<br />
                                • Không bao giờ bỏ vào máy sấy. Nhiệt độ của hơi sấy sẽ làm hỏng vật liệu thân giày, làm giày mất form, đồng thời gây ảnh hưởng tiêu cực đến chất lượng keo dán giày.<br />
                                • Đừng ngâm giày trong nước quá lâu. Giày khác với quần áo vì nó có keo dán giữa thân giày và đế giày. Phần keo dán này không thích bị ngâm nước đâu. Mình thường dùng vòi nước xịt thẳng vào bề mặt giày để tống khứ vết bẩn, nhanh gọn lẹ.<br />
                                • Hạn chế dùng xà bông. Trừ khi giày quá dơ dùng nước không sạch, bạn mới nên sử dụng xà bông pha loãng.<br />
                                • Dùng giấy báo nhét vô giày sau khi giặt xong. Bạn có để ý mỗi lần mua giày về đều thấy có giấy nhét trong giày không? Mục đích của nó là để giữ form giày. Vì thế, mỗi lần giặt xong, bạn nên kiếm giấy báo nhét vô giày rồi mới đem phơi.</p>

                        </div>

                    </div>
                </div>
            </div>
            <div id="" class="detail-item-component-r col-md-3 p-2">
                <div class="side-bar-item p-2">
                    <div class="detail-group mt-4 text-right pr-3"><b><?php echo $data['infoItem']->tenThuongHieu[0]; ?></b></div>
                    <hr>
                    <div class="detail-name">
                        <h3><?php echo $data['infoItem']->TenHH[0]; ?></h3>
                    </div>
                    <div class="detail-price text-left pt-3">
                        <strong><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['infoItem']->Gia[0]); ?><sup>đ</sup></strong>
                    </div>
                    <div class="size-detail pt-3">
                        <strong>CHỌN SIZE</strong>
                        <br>
                        <div class="">
                            <div class="row ml-5 mr-5 mt-3">
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>36</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>37</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>38</span></button>
                            </div>
                            <div class="row ml-5 mr-5">
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>39</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>40</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>41</span></button>
                            </div>
                            <div class="row ml-5 mr-5">
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>42</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>43</span></button>
                                <button class="btn btn-outline-secondary col-md-4 m-0 p-0 border-dark btn-size"><span>44</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <btn class="btn btn-inline-secondary button-size"><strong>Hướng dẫn chọn size giày</strong></btn>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-center">
                        <button class="btn btn-outline-success w-70 btn-add-cart">
                            <h3><strong>Thêm vào giỏ hàng <i class="fas fa-cart-plus"></i></strong></h3>
                        </button>
                    </div>
                    <div class="d-flex flex-row justify-content-center mt-3 btn-to-cart">
                        <a href="../../../../SusuSneaker/Product/Cart"><button class="btn btn-outline-warning"><strong>Đi đến giỏ hàng <i class="fas fa-long-arrow-alt-right"></i><i class="fas fa-shopping-cart"></i></strong></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax("../../../../SusuSneaker/Ajax/checkSize", {
            type: 'POST',
            dataType: 'json',
            data: {
                mshh: <?php echo $data['infoItem']->MSHH[0]; ?>
            },
            success: function(data) {
                var btn_size = document.querySelectorAll('.btn-size');
                for (let j = 0; j < btn_size.length; j++) {
                    var size = btn_size[j].textContent;
                    var bool = false;
                    for (let i = 0; i < data.length; i++) {
                        if (size == data[i])
                            bool = true;
                    }
                    if (bool == false) {
                        btn_size[j].setAttribute("disabled", true);
                    }
                }
            },
            error: function(data) {
                console.log("error");
            }
        });
        $('.btn-add-cart').click(function(e) {
            e.preventDefault();
            <?php
            if (isset($data['json_infoUser']->idUser)) {
                $mskh = $data['json_infoUser']->idKH;
            } else {
                $mskh = 1000000;
            }
            ?>
            if ($('.login_register_icon').hasClass('visitor')) {
                document.location = '../../../../SusuSneaker/Login';
                window.localStorage.setItem('prePage', $(location).attr('href'));
            } else {
                var size = $('.btn-size-submit').text();
                $.post("../../../../SusuSneaker/Ajax/addCart", {
                    size: size,
                    mshh: <?php echo $data['infoItem']->MSHH[0]; ?>,
                    mskh: <?php echo $mskh; ?>,
                    soluong: 1
                }, function(data) {
                    if (data == true) {
                        // trigger click\
                    } else {
                        console.log("loi khi add cart");
                    }
                })
            }

        })

        $('.btn-to-cart').click(function(e) {
            e.preventDefault();
            if ($('.login_register_icon').hasClass('visitor')) {
                document.location = '../../../../SusuSneaker/Login';
                window.localStorage.setItem('prePage', "http://localhost/SusuSneaker/Product/Cart");
            } else {
                //...
            }

        })

    })
</script>