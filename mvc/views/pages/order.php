<div class="order-main">
    <div class="order-child">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card pb-5" style="width:100%">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="card-img-top w-100" src="<?php echo $data['json_infoUser']->avatar; ?>" alt="Card image" style="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="font-weight-bold"><?php echo $data['json_infoUser']->HoTen; ?></div>
                                        <a href="#header" class="trigger-btn-info">
                                            <img src="../../../../SusuSneaker/public/image/helper/pencil.png" style="width: 30px;" alt="">
                                            <div class="d-inline text-secondary">Chỉnh sửa thông tin</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <a id="btn-info" href="#info" class="list-group-item list-group-item-action" data-toggle="tab">
                                    <img src="../../../../SusuSneaker/public/image/helper/user.png" style="width: 30px;" alt="">
                                    <div class="d-inline">Thông tin cá nhân</div>
                                </a>
                                <a id="btn-order" href="#my-order" data-toggle="tab" class="list-group-item list-group-item-action active" aria-disabled="true">
                                    <img src="../../../../SusuSneaker/public/image/helper/order.png" style="width: 30px;" alt="">
                                    <div class="d-inline">Đơn hàng</div>
                                </a>
                                <a id="btn-sale" href="#my-sale" data-toggle="tab" class="list-group-item list-group-item-action" aria-disabled="true">
                                    <img src="../../../../SusuSneaker/public/image/helper/loa.png" style="width: 30px;" alt="">
                                    <div class="d-inline">Khuyến mãi</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col md-8 m-0 pl-0 pr-0">
                    <div class="tab-content">
                        <div id="info" class="tab-pane fade">
                            <h3 class='mt-3 mb-0'>THÔNG TIN CÁ NHÂN</h3>
                            <small class='text-secondary'>(*)Vui lòng cập nhật chính xác thông tin cá nhân</small>
                            <hr>
                            <div class="row all-info">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class='text-secondary'>Tên đăng nhập</label>
                                        </div>
                                        <div class="col-md-9">
                                            <strong><?php echo $data['json_infoUser']->userName; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class='text-secondary'>Họ và tên</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class='form-control full-name-info' placeholder="" value="<?php echo $data['json_infoUser']->HoTen; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class='text-secondary'>Số điện thoại</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="tel" class='form-control phone-info' placeholder="" value="<?php echo $data['json_infoUser']->SoDienThoai; ?>" pattern="[0]{1}[0-9]{9}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class='text-secondary'>Địa chỉ</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="address-info"><?php echo $data['json_infoUser']->DiaChi . ', ' . $data['json_infoUser']->ward . ', ' . $data['json_infoUser']->district . ', ' . $data['json_infoUser']->province;  ?></div>
                                            <button type="submit" class="btn btn-outline-secondary btn-change-address-info btn-sm">Thay đổi địa chỉ</button>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-4">
                                            <button class="btn btn-outline-warning w-100 btn-lg btn-save-info">Lưu</button>
                                        </div>

                                        <span class="error-save-info text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 border border-right-0 border-top-0 border-bottom-0">
                                    <img class="w-100 img-thumbnail" src="<?php echo $data['json_infoUser']->avatar; ?>" alt="avatar" style="">
                                    <input type="file" class="form-control input-upload-avatar" id="customFile" />
                                    <div class="w-50 m-auto">
                                        <button class="btn btn-outline-secondary btn-upload-avatar mt-3">Cập nhật avatar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row change-address-info">
                                <div class="form-group ml-5 w-100">
                                    <div class="row mt-3">
                                        <div class="col-md-9 pl-0 row-input-pay">
                                            <input id="input-address" type="text" required placeholder="" class="w-100 address-pay input-pay pl-5">
                                            <div for='input-address' class="text-input-pay ml-3 pl-3 pr-3 pt-1 pb-1">Số nhà/Đường/Ấp</div>
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
                                    <div class="row mt-3">
                                        <div class="w-50 m-auto">
                                            <button class="btn btn-outline-secondary btn-back-info">Trờ lại</button>
                                            <button class="btn btn-warning btn-update-address-info">Cập nhật địa chỉ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="my-order" class="tab-pane fade in active show">
                            <div class="my-order-child">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item ">
                                        <a href="#all-order" data-toggle="tab" class="nav-link active pl-0">
                                            <img src="" alt="">
                                            <div class="d-inline">Tất cả đơn hàng</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#waiting-order" data-toggle="tab" class="nav-link pl-0">
                                            <img src="" alt="">
                                            <div class="d-inline">Đang chờ xác nhận</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#shipping-order" data-toggle="tab" class="nav-link pl-0 ">
                                            <img src="" alt="">
                                            <div class="d-inline">Đang giao</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#seen-order" data-toggle="tab" class="nav-link pl-0">
                                            <img src="" alt="">
                                            <div class="d-inline">Đã nhận</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#cancel-order" data-toggle="tab" class="nav-link pl-0">
                                            <img src="" alt="">
                                            <div class="d-inline">Đơn hủy</div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="all-order" class="tab-pane fade in active show">
                                        <div class="all-order-child">
                                            <?php
                                            if (count($data['json_MSDH']->MSDH) == 0) {
                                            ?>
                                                <div class='m-auto pt-5'>
                                                    <h4 class='text-center text-secondary dont-weight-bold'>Không có đơn hàng hiển thị
                                                        <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'>
                                                            <h6>Trang chủ</h6>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <?php
                                            } else {
                                                foreach ($data['json_MSDH']->MSDH as $key => $value) {
                                                    $sumPrice = 0;
                                                ?>
                                                    <div class="mt-3 border w-100">
                                                        <div class="d-flex flex-row justify-content-between p-3 bg-main-child">
                                                            <b class="text-info date-order">Ngày đặt hàng: <?php echo $data['json_MSDH']->NgayDH[$key]; ?></b>
                                                            <b class="text-danger state-order"><?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                        </div>
                                                        <hr class="mr-3 ml-3 mt-0">
                                                        <div class="p-2">
                                                            <?php
                                                            foreach ($data['json_AllOrder']->MSDH as $key1 => $value1) {
                                                                if ($value1 == $value) {
                                                                    $sumPrice += $data['json_AllOrder']->gia[$key1];
                                                            ?>
                                                                    <div class="row">
                                                                        <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class="col-md-3">
                                                                            <img src="<?php echo $data['json_AllOrder']->srcHinh[$key1]; ?>" alt="image" class="img-item-order w-100 mr-3 ml-3 img-thumbail">
                                                                        </a>
                                                                        <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class=" col-md-7">
                                                                            <div class="w-100">
                                                                                <span class="name-item-order"><?php echo $data['json_AllOrder']->TenHH[$key1]; ?></span><br>
                                                                                <small class="text-secondary"><?php echo "Size " . $data['json_AllOrder']->size[$key1] . " x " . $data['json_AllOrder']->soLuong[$key1]; ?></small>
                                                                            </div>
                                                                        </a>
                                                                        <div class="col-md-2 d-flex align-items-center">
                                                                            <b class="m-auto text-danger price-item-order"><?php echo number_format($data['json_AllOrder']->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></b>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="mr-3 ml-3 mb-0">
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <div class="d-flex flex-row justify-content-between pt-3 mb-0 pb-3" style="background-color: #fff9e6;">
                                                                <h4 class="text-danger font-weight-bold ml-3 sum-price-order mb-0 d-flex align-items-center">Tổng tiền: <?php echo number_format($sumPrice) . "<sup class='text-danger'>đ</sup>"; ?></h4>
                                                                <?php
                                                                if ($data['json_MSDH']->TrangThai[$key] == 'Đang chờ xác nhận') {
                                                                    echo '<button data-MSDH="' . $value . '" class="btn btn-outline-danger mr-3 btn-cancel-order">Hủy đơn 
                                                                    <img src="../../../../SusuSneaker/public/image/helper/cancel.png" style="width: 40px;" alt=""></button>';
                                                                } else if ($data['json_MSDH']->TrangThai[$key] == 'Đang giao') {
                                                                    echo '<button data-MSDH="' . $value . '" class="btn btn-success mr-3 btn-seen-order">Đã nhận 
                                                                    <img src="../../../../SusuSneaker/public/image/helper/seen.png" style="width: 40px;" alt=""></button>';
                                                                } else if ($data['json_MSDH']->TrangThai[$key] == 'Đã nhận') {
                                                                    echo '<button disabled data-MSDH="' . $value . '" class="btn btn-success mr-3 btn-seen-order">Đã nhận 
                                                                    <img src="../../../../SusuSneaker/public/image/helper/seen.png" style="width: 40px;" alt=""></button>';
                                                                } else if ($data['json_MSDH']->TrangThai[$key] == 'Đã hủy') {
                                                                    echo '<button data-MSDH="' . $value . '" class="btn btn-warning mr-3 btn-repurchase-order">Mua lại 
                                                                    <img src="../../../../SusuSneaker/public/image/helper/repurchase.png" style="width: 40px;" alt=""></button>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="waiting-order" class="tab-pane fade">
                                        <div class="waiting-order-child">
                                            <?php
                                            $count = 0;
                                            foreach ($data['json_MSDH']->TrangThai as $k => $v) {
                                                if ($v == 'Đang chờ xác nhận')
                                                    $count++;
                                            }
                                            if ($count == 0) {
                                            ?>
                                                <div class='m-auto pt-5'>
                                                    <h4 class='text-center text-secondary dont-weight-bold'>Không có đơn hàng hiển thị
                                                        <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'>
                                                            <h6>Trang chủ</h6>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <?php
                                            } else {
                                                foreach ($data['json_MSDH']->MSDH as $key => $value) {
                                                    $sumPrice = 0;
                                                    if ($data['json_MSDH']->TrangThai[$key] == "Đang chờ xác nhận") {
                                                ?>
                                                        <div class="mt-3 border w-100">
                                                            <div class="d-flex flex-row justify-content-between p-3 bg-main-child">
                                                                <b class="text-info date-order">Ngày đặt hàng: <?php echo $data['json_MSDH']->NgayDH[$key]; ?></b>
                                                                <b class="text-danger state-order"><?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                            </div>
                                                            <hr class="mr-3 ml-3 mt-0">
                                                            <div class="p-2">
                                                                <?php
                                                                foreach ($data['json_AllOrder']->MSDH as $key1 => $value1) {
                                                                    if ($value1 == $value) {
                                                                        $sumPrice += $data['json_AllOrder']->gia[$key1];
                                                                ?>
                                                                        <div class="row">
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class="col-md-3">
                                                                                <img src="<?php echo $data['json_AllOrder']->srcHinh[$key1]; ?>" alt="image" class="img-item-order w-100 mr-3 ml-3 img-thumbail">
                                                                            </a>
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class=" col-md-7">
                                                                                <div class="w-100">
                                                                                    <span class="name-item-order"><?php echo $data['json_AllOrder']->TenHH[$key1]; ?></span><br>
                                                                                    <small class="text-secondary"><?php echo "Size " . $data['json_AllOrder']->size[$key1] . " x " . $data['json_AllOrder']->soLuong[$key1]; ?></small>
                                                                                </div>
                                                                            </a>
                                                                            <div class="col-md-2 d-flex align-items-center">
                                                                                <b class="m-auto text-danger price-item-order"><?php echo number_format($data['json_AllOrder']->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></b>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mr-3 ml-3 mb-0">
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="d-flex flex-row justify-content-between pt-3 mb-0 pb-3" style="background-color: #fff9e6;">
                                                                    <h4 class="text-danger font-weight-bold ml-3 sum-price-order mb-0 d-flex align-items-center">Tổng tiền: <?php echo number_format($sumPrice) . "<sup class='text-danger'>đ</sup>"; ?></h4>
                                                                    <button data-MSDH="<?php echo $value; ?>" class="btn btn-outline-danger mr-3 btn-cancel-order">Hủy đơn
                                                                        <img src="../../../../SusuSneaker/public/image/helper/cancel.png" style="width: 40px;" alt=""></button></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="shipping-order" class="tab-pane fade">
                                        <div class="shipping-order-child">
                                            <?php
                                            $count = 0;
                                            foreach ($data['json_MSDH']->TrangThai as $k => $v) {
                                                if ($v == 'Đang giao')
                                                    $count++;
                                            }
                                            if ($count == 0) {
                                            ?>
                                                <div class='m-auto pt-5'>
                                                    <h4 class='text-center text-secondary dont-weight-bold'>Không có đơn hàng hiển thị
                                                        <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'>
                                                            <h6>Trang chủ</h6>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <?php
                                            } else {

                                                foreach ($data['json_MSDH']->MSDH as $key => $value) {
                                                    $sumPrice = 0;
                                                    if ($data['json_MSDH']->TrangThai[$key] == "Đang giao") {
                                                ?>
                                                        <div class="mt-3 border w-100">
                                                            <div class="d-flex flex-row justify-content-between p-3 bg-main-child">
                                                                <b class="text-info date-order">Ngày đặt hàng: <?php echo $data['json_MSDH']->NgayDH[$key]; ?></b>
                                                                <b class="text-danger state-order"><?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                            </div>
                                                            <hr class="mr-3 ml-3 mt-0">
                                                            <div class="p-2">
                                                                <?php
                                                                foreach ($data['json_AllOrder']->MSDH as $key1 => $value1) {
                                                                    if ($value1 == $value) {
                                                                        $sumPrice += $data['json_AllOrder']->gia[$key1];
                                                                ?>
                                                                        <div class="row">
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class="col-md-3">
                                                                                <img src="<?php echo $data['json_AllOrder']->srcHinh[$key1]; ?>" alt="image" class="img-item-order w-100 mr-3 ml-3 img-thumbail">
                                                                            </a>
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class=" col-md-7">
                                                                                <div class="w-100">
                                                                                    <span class="name-item-order"><?php echo $data['json_AllOrder']->TenHH[$key1]; ?></span><br>
                                                                                    <small class="text-secondary"><?php echo "Size " . $data['json_AllOrder']->size[$key1] . " x " . $data['json_AllOrder']->soLuong[$key1]; ?></small>
                                                                                </div>
                                                                            </a>
                                                                            <div class="col-md-2 d-flex align-items-center">
                                                                                <b class="m-auto text-danger price-item-order"><?php echo number_format($data['json_AllOrder']->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></b>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mr-3 ml-3 mb-0">
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="d-flex flex-row justify-content-between pt-3 mb-0 pb-3" style="background-color: #fff9e6;">
                                                                    <h4 class="text-danger font-weight-bold ml-3 sum-price-order mb-0 d-flex align-items-center">Tổng tiền: <?php echo number_format($sumPrice) . "<sup class='text-danger'>đ</sup>"; ?></h4>
                                                                    <button data-MSDH="<?php echo $value; ?>" class="btn btn-success mr-3 btn-seen-order">Đã nhận
                                                                        <img src="../../../../SusuSneaker/public/image/helper/seen.png" style="width: 40px;" alt=""></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="seen-order" class="tab-pane fade">
                                        <div class="seen-order-child">
                                            <?php
                                            $count = 0;
                                            foreach ($data['json_MSDH']->TrangThai as $k => $v) {
                                                if ($v == 'Đã nhận')
                                                    $count++;
                                            }
                                            if ($count == 0) {
                                            ?>
                                                <div class='m-auto pt-5'>
                                                    <h4 class='text-center text-secondary dont-weight-bold'>Không có đơn hàng hiển thị
                                                        <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'>
                                                            <h6>Trang chủ</h6>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <?php
                                            } else {
                                                foreach ($data['json_MSDH']->MSDH as $key => $value) {
                                                    $sumPrice = 0;
                                                    if ($data['json_MSDH']->TrangThai[$key] == "Đã nhận") {
                                                ?>
                                                        <div class="mt-3 border w-100">
                                                            <div class="d-flex flex-row justify-content-between p-3 bg-main-child">
                                                                <b class="text-info date-order">Ngày đặt hàng: <?php echo $data['json_MSDH']->NgayDH[$key]; ?></b>
                                                                <b class="text-danger state-order"><?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                            </div>
                                                            <hr class="mr-3 ml-3 mt-0">
                                                            <div class="p-2">
                                                                <?php
                                                                foreach ($data['json_AllOrder']->MSDH as $key1 => $value1) {
                                                                    if ($value1 == $value) {
                                                                        $sumPrice += $data['json_AllOrder']->gia[$key1];
                                                                ?>
                                                                        <div class="row">
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class="col-md-3">
                                                                                <img src="<?php echo $data['json_AllOrder']->srcHinh[$key1]; ?>" alt="image" class="img-item-order w-100 mr-3 ml-3 img-thumbail">
                                                                            </a>
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class=" col-md-7">
                                                                                <div class="w-100">
                                                                                    <span class="name-item-order"><?php echo $data['json_AllOrder']->TenHH[$key1]; ?></span><br>
                                                                                    <small class="text-secondary"><?php echo "Size " . $data['json_AllOrder']->size[$key1] . " x " . $data['json_AllOrder']->soLuong[$key1]; ?></small>
                                                                                </div>
                                                                            </a>
                                                                            <div class="col-md-2 d-flex align-items-center">
                                                                                <b class="m-auto text-danger price-item-order"><?php echo number_format($data['json_AllOrder']->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></b>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mr-3 ml-3 mb-0">
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="d-flex flex-row justify-content-between pt-3 mb-0 pb-3" style="background-color: #fff9e6;">
                                                                    <h4 class="text-danger font-weight-bold ml-3 sum-price-order mb-0 d-flex align-items-center">Tổng tiền: <?php echo number_format($sumPrice) . "<sup class='text-danger'>đ</sup>"; ?></h4>
                                                                    <button disabled data-MSDH="<?php echo $value; ?>" class="btn btn-success mr-3 btn-seen-order">Đã nhận
                                                                        <img src="../../../../SusuSneaker/public/image/helper/seen.png" style="width: 40px;" alt=""></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="cancel-order" class="tab-pane fade">
                                        <div class="cancel-order-child">
                                            <?php
                                            $count = 0;
                                            foreach ($data['json_MSDH']->TrangThai as $k => $v) {
                                                if ($v == 'Đã hủy')
                                                    $count++;
                                            }
                                            if ($count == 0) {
                                            ?>
                                                <div class='m-auto pt-5'>
                                                    <h4 class='text-center text-secondary dont-weight-bold'>Không có đơn hàng hiển thị
                                                        <a href='../../../../SusuSneaker/Home/SayHi' class='text-muted font-italic'>
                                                            <h6>Trang chủ</h6>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <?php
                                            } else {
                                                foreach ($data['json_MSDH']->MSDH as $key => $value) {
                                                    $sumPrice = 0;
                                                    if ($data['json_MSDH']->TrangThai[$key] == "Đã hủy") {
                                                ?>
                                                        <div class="mt-3 border w-100">
                                                            <div class="d-flex flex-row justify-content-between p-3 bg-main-child">
                                                                <b class="text-info date-order">Ngày đặt hàng: <?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                                <b class="text-danger state-order"><?php echo $data['json_MSDH']->TrangThai[$key]; ?></b>
                                                            </div>
                                                            <hr class="mr-3 ml-3 mt-0">
                                                            <div class="p-2">
                                                                <?php
                                                                foreach ($data['json_AllOrder']->MSDH as $key1 => $value1) {
                                                                    if ($value1 == $value) {
                                                                        $sumPrice += $data['json_AllOrder']->gia[$key1];
                                                                ?>
                                                                        <div class="row">
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class="col-md-3">
                                                                                <img src="<?php echo $data['json_AllOrder']->srcHinh[$key1]; ?>" alt="image" class="img-item-order w-100 mr-3 ml-3 img-thumbail">
                                                                            </a>
                                                                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_AllOrder']->MSHH[$key1]; ?>" class=" col-md-7">
                                                                                <div class="w-100">
                                                                                    <span class="name-item-order"><?php echo $data['json_AllOrder']->TenHH[$key1]; ?></span><br>
                                                                                    <small class="text-secondary"><?php echo "Size " . $data['json_AllOrder']->size[$key1] . " x " . $data['json_AllOrder']->soLuong[$key1]; ?></small>
                                                                                </div>
                                                                            </a>
                                                                            <div class="col-md-2 d-flex align-items-center">
                                                                                <b class="m-auto text-danger price-item-order"><?php echo number_format($data['json_AllOrder']->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></b>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mr-3 ml-3 mb-0">
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="d-flex flex-row justify-content-between pt-3 mb-0 pb-3" style="background-color: #fff9e6;">
                                                                    <h4 class="text-danger font-weight-bold ml-3 sum-price-order mb-0 d-flex align-items-center">Tổng tiền: <?php echo number_format($sumPrice) . "<sup class='text-danger'>đ</sup>"; ?></h4>
                                                                    <button data-MSDH="<?php echo $value; ?>" class="btn btn-warning mr-3 btn-repurchase-order">Mua lại
                                                                        <img src="../../../../SusuSneaker/public/image/helper/repurchase.png" style="width: 40px;" alt=""></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="my-sale" class="tab-pane fade">
                            sale
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
    $('.trigger-btn-info').click(function() {
        $('#btn-info').trigger('click');
    });
    for (let i = 0; i < $('.btn-cancel-order').length; i++) {
        $('.btn-cancel-order').get(i).addEventListener('click', function() {
            var MSDH = $(this).attr('data-MSDH');
            $.ajax("../../../../SusuSneaker/Ajax/updateStateOrder", {
                type: 'post',
                dataType: 'html',
                data: {
                    stateUpdate: 3,
                    msdh: MSDH
                },
                success: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                },
                error: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                }
            });
        })
    }
    for (let i = 0; i < $('.btn-seen-order').length; i++) {
        $('.btn-seen-order').get(i).addEventListener('click', function() {
            var MSDH = $(this).attr('data-MSDH');
            $.ajax("../../../../SusuSneaker/Ajax/updateStateOrder", {
                type: 'post',
                dataType: 'html',
                data: {
                    stateUpdate: 2,
                    msdh: MSDH
                },
                success: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                },
                error: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                }
            });
        })
    }
    for (let i = 0; i < $('.btn-repurchase-order').length; i++) {
        $('.btn-repurchase-order').get(i).addEventListener('click', function() {
            var MSDH = $(this).attr('data-MSDH');
            $.ajax("../../../../SusuSneaker/Ajax/updateStateOrder", {
                type: 'post',
                dataType: 'html',
                data: {
                    stateUpdate: 0,
                    msdh: MSDH
                },
                success: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                },
                error: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>';
                }
            });
        })
    }
    var action = "<?php echo $data['action']; ?>";
    $('#btn-order').removeClass('active');
    $('#btn-info').removeClass('active');
    $('#btn-sale').removeClass('active');
    $('#info').removeClass('in active show');
    $('#my-order').removeClass('in active show');
    $('#my-sale').removeClass('in active show');
    if (action == 'Order') {
        $('#btn-order').addClass('active');
        $('#my-order').addClass('in active show');
    } else if (action == 'Info') {
        $('#btn-info').addClass('active');
        $('#info').addClass('in active show');
    } else if (action == 'Sale') {
        $('#btn-sale').addClass('active');
        $('#my-sale').addClass('in active show');
    } else {
        window.location = '../../../../../SusuSneaker/Home/SayHi';
    }

    var allInfo = document.querySelector(".all-info");
    var changeAddressInfo = document.querySelector(".change-address-info");
    $('.change-address-info').remove();
    $('.btn-change-address-info').click(function() {
        $(".all-info").remove();
        $('#info').append(changeAddressInfo);

        for (let i = 0; i < $('.row-input-pay').length; i++) {
            $('.row-input-pay').get(i).addEventListener('focusin', function() {
                console.log("hi");
                $($('.text-input-pay').get(i)).addClass('move-text-input');
            })
            $('.row-input-pay').get(i).addEventListener('focusout', function() {
                if ($($('.input-pay').get(i)).val() == '')
                    $($('.text-input-pay').get(i)).removeClass('move-text-input');
            })
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

        $('.btn-back-info').click(function() {
            $(".change-address-info").remove();
            $('#info').append(allInfo);
            window.location.reload();
        })

        $('.btn-update-address-info').click(function() {
            address = $('.address-pay').val();
            var province = $('.province-pay').val();
            var district = $('.district-pay').val();
            ward = $('.ward-pay').val();
            var check = true;
            $('.error-province').html('');
            $('.error-district').html('');
            $('.error-ward').html('');
            $('.error-address').html('');
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
            if (check === true) {
                $.ajax("../../../../SusuSneaker/Ajax/updateAddressUser", {
                    async: true,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        idUser: <?php echo $_SESSION['idKH']; ?>,
                        idGroup: <?php echo $_SESSION['idGroup']; ?>,
                        address: address,
                        nameWard: ward
                    },
                    success: function(data) {
                        window.location = '../../../../SusuSneaker/Product/User/Info/<?php echo $data['json_infoUser']->idUser; ?>';
                    },
                    error: function(data) {
                        window.location.reload();
                    }
                });

            }
        })
    });
    $('.btn-save-info').click(function() {
        var fullName = $('.full-name-info').val();
        var phone = $('.phone-info').val();
        var check = true;
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        $('.error-save-info').html('');
        if (phone == '' && fullName == '') {
            check = false;
        } else {
            if (vnf_regex.test(phone) == false || phone == "") {
                $('.error-save-info').append('*Số điện thoại của bạn không đúng định dạng');
                check = false;
            }
        }
        if (check) {
            $.ajax("../../../../SusuSneaker/Ajax/updateInfoUser", {
                async: true, 
                type: 'POST',
                dataType: 'html',
                data: {
                    idUser: <?php echo $_SESSION['idKH']; ?>,
                    idGroup: <?php echo $_SESSION['idGroup']; ?>,
                    fullName: fullName,
                    phone: phone
                },
                success: function(data) {
                    window.location = '../../../../SusuSneaker/Product/User/Info/<?php echo $data['json_infoUser']->idUser; ?>';
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }
    })
    // var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
    //     'onclick="alert(\'Call your custom code here.\')">' +
    //     '<i class="glyphicon glyphicon-tag"></i>' +
    //     '</button>';
    // $($('.input-upload-avatar')).fileinput({
    //     overwriteInitial: true,
    //     maxFileSize: 1500,
    //     showClose: false,
    //     showCaption: false,
    //     browseLabel: '',
    //     removeLabel: '',
    //     browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    //     removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    //     removeTitle: 'Cancel or reset changes',
    //     elErrorContainer: '#kv-avatar-errors-1',
    //     msgErrorClass: 'alert alert-block alert-danger',
    //     defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar">',
    //     layoutTemplates: {
    //         main2: '{preview} ' + btnCust + ' {remove} {browse}'
    //     },
    //     allowedFileExtensions: ["jpg", "png", "gif"]
    // })
    // $("#avatar-1").fileinput({
    //     overwriteInitial: true,
    //     maxFileSize: 1500,
    //     showClose: false,
    //     showCaption: false,
    //     browseLabel: '',
    //     removeLabel: '',
    //     browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    //     removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    //     removeTitle: 'Cancel or reset changes',
    //     elErrorContainer: '#kv-avatar-errors-1',
    //     msgErrorClass: 'alert alert-block alert-danger',
    //     defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar">',
    //     layoutTemplates: {
    //         main2: '{preview} ' + btnCust + ' {remove} {browse}'
    //     },
    //     allowedFileExtensions: ["jpg", "png", "gif"]
    // });             
</script>
<!-- some CSS styling changes and overrides -->
