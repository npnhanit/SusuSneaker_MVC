<?php
if (isset($getOrder->MSDH[0])) {
    foreach ($getOrder->MSDH as $key => $value) { ?>
        <div class="row mt-2 border-4">
            <div class="col-lg-12">
                <div class="row border pl-0 ">
                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $getOrder->ngaydathang[$key]; ?></div>
                    <div class="col-lg-5">Trạng thái đơn hàng:
                        <?php if ($getOrder->trangthai[$key] == 0) {
                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                        } elseif ($getOrder->trangthai[$key] == 1) {
                            echo  '<span class="text-info">Đang giao</span>';
                        } elseif ($getOrder->trangthai[$key] == 2) {
                            echo  '<span class="text-success">Đã nhận</span>';
                        } elseif ($getOrder->trangthai[$key] == 3) {
                            echo  '<span class="text-danger">Đơn hủy</span>';
                        }
                        ?>
                    </div>

                </div>
                <div class="row pt-2">
                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                        <?php echo $getOrder->diachi[$key] . ", " . $getOrder->xaphuong[$key] . ", " . $getOrder->quanhuyen[$key] . ", " . $getOrder->tinhthanh[$key];  ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                        <?php echo $getOrder->tennguoinhan[$key]; ?>
                    </div>
                    <div class="col-lg-5">Số điện thoại người nhận:
                        <?php echo $getOrder->sodienthoai[$key]; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                        <?php echo $getOrder->sosanpham[$key]; ?>
                    </div>
                    <div class="col-lg-5">Tổng tiền:
                        <?php echo $getOrder->tongtien[$key]; ?>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-lg-2 pr-0">
                    </div>
                    <div class="col-lg-5">Tài khoản:
                        <?php echo $getOrder->tendangnhap[$key]; ?>
                    </div>
                </div>
                <?php
                $count = 0;
                $sum = 0;
                foreach ($getDetailOrder->MSHH as $key1 => $value1) {
                    $count++;
                    $sum+=$getDetailOrder->gia[$key1];
                ?>
                    <div class="row pt-1">
                        <div class="col-lg-1 text-center"><?php echo $count; ?></div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img class='w-100' src="<?php echo $getDetailOrder->srcHinh[$key1]; ?>" alt="">
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class=""><?php echo $getDetailOrder->tensanpham[$key1]; ?></div>
                                    </div>
                                    <div class="row">
                                        <small class="text-secondary">Size <?php echo $getDetailOrder->size[$key1]; ?></small>
                                    </div>
                                    <div class="row">
                                        <small class="text-secondary">Số lượng <?php echo $getDetailOrder->soluong[$key1]; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex flex-row justify-content-center align-items-center">
                            <div class=""><?php echo $getDetailOrder->thuonghieu[$key1]; ?></div>
                        </div>
                        <div class="col-lg-2 d-flex flex-row justify-content-start align-items-center">
                            <div class="text-left"><?php echo number_format($getDetailOrder->gia[$key1]) . "<sup class='text-danger'>đ</sup>"; ?></div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="row d-flex flex-row justify-content-end">
                    <div class="col-lg-3 text-right">Tổng tiền hàng</div>
                    <div class="col-lg-2 text-left"><?php echo number_format($sum) . "<sup class='text-danger'>đ</sup>"; ?></div>
                </div>
                <div class="row d-flex flex-row justify-content-end">
                    <div class="col-lg-3 text-right">Phí vận chuyển: </div>
                    <div class="col-lg-2 text-left""><?php echo number_format(30000) . "<sup class='text-danger'>đ</sup>"; ?></div>
                </div>
                <div class="row d-flex flex-row justify-content-end pb-2">
                    <div class="col-lg-3 text-right">Tổng cộng: </div>
                    <div class="col-lg-2 text-left"><?php echo number_format($sum + 30000) . "<sup class='text-danger'>đ</sup>"; ?></div>
                </div>
            </div>
        </div>
<?php
    }
} else {
}
?>