<div class="container-search">
    <?php
    if (isset($getOrderSearch->MSDH[0])) {
        foreach ($getOrderSearch->MSDH as $key => $value) { ?>
            <div class="row mt-2 border-4">
                <div class="col-lg-12">
                    <div class="row border pl-0 ">
                        <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                        <div class="col-lg-5">Ngày đặt hàng: <?php echo $getOrderSearch->ngaydathang[$key]; ?></div>
                        <div class="col-lg-5">Trạng thái đơn hàng:
                            <?php if ($getOrderSearch->trangthai[$key] == 0) {
                                echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                            } elseif ($getOrderSearch->trangthai[$key] == 1) {
                                echo  '<span class="text-info">Đang giao</span>';
                            } elseif ($getOrderSearch->trangthai[$key] == 2) {
                                echo  '<span class="text-success">Đã nhận</span>';
                            } elseif ($getOrderSearch->trangthai[$key] == 3) {
                                echo  '<span class="text-danger">Đơn hủy</span>';
                            }
                            ?>
                        </div>

                    </div>
                    <div class="row pt-2">
                        <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                            <?php echo $getOrderSearch->diachi[$key] . ", " . $getOrderSearch->xaphuong[$key] . ", " . $getOrderSearch->quanhuyen[$key] . ", " . $getOrderSearch->tinhthanh[$key];  ?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 offset-lg-2">Tên người nhận:
                            <?php echo $getOrderSearch->tennguoinhan[$key]; ?>
                        </div>
                        <div class="col-lg-5">Số điện thoại người nhận:
                            <?php echo $getOrderSearch->sodienthoai[$key]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                            <?php echo $getOrderSearch->sosanpham[$key]; ?>
                        </div>
                        <div class="col-lg-5">Tổng tiền:
                            <?php echo $getOrderSearch->tongtien[$key]; ?>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2 pr-0">
                            <a data-MSDH="$value" href="">Chi tiết đơn hàng</a>
                        </div>
                        <div class="col-lg-5">Tài khoản:
                            <?php echo $getOrderSearch->tendangnhap[$key]; ?>
                        </div>
                        <div class="col-lg-5">
                            <?php
                            if ($getOrderSearch->trangthai[$key] == 0) {
                                echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-info btn-confirm-order">Duyệt đơn</button>';
                                echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-danger btn-cancel-order">Hủy đơn</button>';
                            } elseif ($getOrderSearch->trangthai[$key] == 1) {
                                echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-success btn-seen-order">Đã nhận</button>';
                            } elseif ($getOrderSearch->trangthai[$key] == 2) {
                                echo  '<span class="text-success">Hoàn tất</span>';
                            } elseif ($getOrderSearch->trangthai[$key] == 3) {
                                echo  '<span class="text-danger">Đã huỷ</span>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
    }
    ?>
</div>