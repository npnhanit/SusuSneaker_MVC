<div class="">
    <div class="row text-center pb-3 pt-3 mt-3 d-flex flex-row justify-content-center">
        <h2 class="text-center info title-admin font-weight-bold">Quản lý đơn hàng</h2>
    </div>
    <div class="row bg-main p-3">
        <div class="col-md-6 offset-md-3">
            <input class="form-control search-order" type="text" placeholder="Nhập mã đơn bạn muốn tìm">
            <span class='text-success text-result-order'></span>
            <span class='text-warning text-resultsearch-order'></span>
        </div>
    </div>
    <div class="">
        <ul class="nav nav-tabs d-flex flex-row justify-content-center">
            <li class="nav-item">
                <a href="#all-order" data-toggle="tab" class="nav-link active click-all-order">Tất cả đơn hàng</a>
            </li>
            <li class="nav-item">
                <a href="#waiting-order" data-toggle="tab" class="nav-link">Chờ phê duyệt</a>
            </li>
            <li class="nav-item">
                <a href="#shipping-order" data-toggle="tab" class="nav-link">Đang giao</a>
            </li>
            <li class="nav-item">
                <a href="#shipped-order" data-toggle="tab" class="nav-link">Đã giao</a>
            </li>
            <li class="nav-item">
                <a href="#cancel-order" data-toggle="tab" class="nav-link">Đơn hủy</a>
            </li>
            <li class="nav-item">
                <a href="#detail-order" data-toggle="tab" class="nav-link click-detail-order">Chi tiết đơn hàng</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container active overflow-auto" id="all-order">
                <div class="container-search">
                    <?php foreach ($data['full-order']->MSDH as $key => $value) { ?>
                        <div class="row mt-2 border-4">
                            <div class="col-lg-12">
                                <div class="row border pl-0 ">
                                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $data['full-order']->ngaydathang[$key]; ?></div>
                                    <div class="col-lg-5">Trạng thái đơn hàng:
                                        <?php if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<span class="text-info">Đang giao</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                                        <?php echo $data['full-order']->diachi[$key] . ", " . $data['full-order']->xaphuong[$key] . ", " . $data['full-order']->quanhuyen[$key] . ", " . $data['full-order']->tinhthanh[$key];  ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                                        <?php echo $data['full-order']->tennguoinhan[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Số điện thoại người nhận:
                                        <?php echo $data['full-order']->sodienthoai[$key]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                                        <?php echo $data['full-order']->sosanpham[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Tổng tiền:
                                        <?php echo $data['full-order']->tongtien[$key]; ?>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2 pr-0">
                                        <a data-MSDH="<?php echo $value; ?>" href="#detail-order" class="btn-detail-order">Chi tiết đơn hàng</a>
                                    </div>
                                    <div class="col-lg-5">Tài khoản:
                                        <?php echo $data['full-order']->tendangnhap[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-info btn-confirm-order">Duyệt đơn</button>';
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-danger btn-cancel-order">Hủy đơn</button>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-success btn-seen-order">Đã nhận</button>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Hoàn tất</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đã huỷ</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane container" id="waiting-order">
                <?php foreach ($data['full-order']->MSDH as $key => $value) {
                    if ($data['full-order']->trangthai[$key] == 0) {
                ?>
                        <div class="row mt-2 border-4">
                            <div class="col-lg-12">
                                <div class="row border pl-0 ">
                                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $data['full-order']->ngaydathang[$key]; ?></div>
                                    <div class="col-lg-5">Trạng thái đơn hàng:
                                        <?php if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<span class="text-info">Đang giao</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                                        <?php echo $data['full-order']->diachi[$key] . ", " . $data['full-order']->xaphuong[$key] . ", " . $data['full-order']->quanhuyen[$key] . ", " . $data['full-order']->tinhthanh[$key];  ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                                        <?php echo $data['full-order']->tennguoinhan[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Số điện thoại người nhận:
                                        <?php echo $data['full-order']->sodienthoai[$key]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                                        <?php echo $data['full-order']->sosanpham[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Tổng tiền:
                                        <?php echo $data['full-order']->tongtien[$key]; ?>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2 pr-0">
                                        <a data-MSDH="<?php echo $value; ?>" href="#detail-order" class="btn-detail-order">Chi tiết đơn hàng</a>
                                    </div>
                                    <div class="col-lg-5">Tài khoản:
                                        <?php echo $data['full-order']->tendangnhap[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-info btn-confirm-order">Duyệt đơn</button>';
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-danger btn-cancel-order">Hủy đơn</button>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="tab-pane container" id="shipping-order">
                <?php foreach ($data['full-order']->MSDH as $key => $value) {
                    if ($data['full-order']->trangthai[$key] == 1) {
                ?>
                        <div class="row mt-2 border-4">
                            <div class="col-lg-12">
                                <div class="row border pl-0 ">
                                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $data['full-order']->ngaydathang[$key]; ?></div>
                                    <div class="col-lg-5">Trạng thái đơn hàng:
                                        <?php if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<span class="text-info">Đang giao</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                                        <?php echo $data['full-order']->diachi[$key] . ", " . $data['full-order']->xaphuong[$key] . ", " . $data['full-order']->quanhuyen[$key] . ", " . $data['full-order']->tinhthanh[$key];  ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                                        <?php echo $data['full-order']->tennguoinhan[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Số điện thoại người nhận:
                                        <?php echo $data['full-order']->sodienthoai[$key]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                                        <?php echo $data['full-order']->sosanpham[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Tổng tiền:
                                        <?php echo $data['full-order']->tongtien[$key]; ?>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2 pr-0">
                                        <a data-MSDH="<?php echo $value; ?>" href="#detail-order" class="btn-detail-order">Chi tiết đơn hàng</a>
                                    </div>
                                    <div class="col-lg-5">Tài khoản:
                                        <?php echo $data['full-order']->tendangnhap[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        if ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<button data-MSDH="' . $value . '" class="btn btn-outline-success btn-seen-order">Đã nhận</button>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="tab-pane container" id="shipped-order">
                <?php foreach ($data['full-order']->MSDH as $key => $value) {
                    if ($data['full-order']->trangthai[$key] == 2) {
                ?>
                        <div class="row mt-2 border-4">
                            <div class="col-lg-12">
                                <div class="row border pl-0 ">
                                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $data['full-order']->ngaydathang[$key]; ?></div>
                                    <div class="col-lg-5">Trạng thái đơn hàng:
                                        <?php if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<span class="text-info">Đang giao</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                                        <?php echo $data['full-order']->diachi[$key] . ", " . $data['full-order']->xaphuong[$key] . ", " . $data['full-order']->quanhuyen[$key] . ", " . $data['full-order']->tinhthanh[$key];  ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                                        <?php echo $data['full-order']->tennguoinhan[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Số điện thoại người nhận:
                                        <?php echo $data['full-order']->sodienthoai[$key]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                                        <?php echo $data['full-order']->sosanpham[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Tổng tiền:
                                        <?php echo $data['full-order']->tongtien[$key]; ?>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2 pr-0">
                                        <a data-MSDH="<?php echo $value; ?>" href="#detail-order" class="btn-detail-order">Chi tiết đơn hàng</a>
                                    </div>
                                    <div class="col-lg-5">Tài khoản:
                                        <?php echo $data['full-order']->tendangnhap[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        if ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="tab-pane container" id="cancel-order">
                <?php foreach ($data['full-order']->MSDH as $key => $value) {
                    if ($data['full-order']->trangthai[$key] == 3) {
                ?>
                        <div class="row mt-2 border-4">
                            <div class="col-lg-12">
                                <div class="row border pl-0 ">
                                    <div class="col-lg-2">MSĐH: <?php echo $value ?></div>
                                    <div class="col-lg-5">Ngày đặt hàng: <?php echo $data['full-order']->ngaydathang[$key]; ?></div>
                                    <div class="col-lg-5">Trạng thái đơn hàng:
                                        <?php if ($data['full-order']->trangthai[$key] == 0) {
                                            echo  '<span class="text-warning">Đang chờ xác nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 1) {
                                            echo  '<span class="text-info">Đang giao</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 2) {
                                            echo  '<span class="text-success">Đã nhận</span>';
                                        } elseif ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-10 offset-lg-2">Địa chỉ nhận:
                                        <?php echo $data['full-order']->diachi[$key] . ", " . $data['full-order']->xaphuong[$key] . ", " . $data['full-order']->quanhuyen[$key] . ", " . $data['full-order']->tinhthanh[$key];  ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Tên người nhận:
                                        <?php echo $data['full-order']->tennguoinhan[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Số điện thoại người nhận:
                                        <?php echo $data['full-order']->sodienthoai[$key]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-2">Số sản phẩm:
                                        <?php echo $data['full-order']->sosanpham[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">Tổng tiền:
                                        <?php echo $data['full-order']->tongtien[$key]; ?>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2 pr-0">
                                        <a data-MSDH="<?php echo $value; ?>" href="#detail-order" class="btn-detail-order">Chi tiết đơn hàng</a>
                                    </div>
                                    <div class="col-lg-5">Tài khoản:
                                        <?php echo $data['full-order']->tendangnhap[$key]; ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                        if ($data['full-order']->trangthai[$key] == 3) {
                                            echo  '<span class="text-danger">Đơn hủy</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="tab-pane container" id="detail-order">

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        for (let i = 0; i < $('.btn-confirm-order').length; i++) {
            $('.btn-confirm-order').click(function() {
                var msdh = $(this).data('msdh');
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/confirmOrder",
                    data: {
                        msdh: msdh
                    },
                    dataType: "html",
                    success: function(data) {
                        $('.text-result-order').html('');
                        location.reload();
                    }
                });
            })
        }
        for (let i = 0; i < $('.btn-cancel-order').length; i++) {
            $('.btn-cancel-order').click(function() {
                var msdh = $(this).data('msdh');
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/cancelOrder",
                    data: {
                        msdh: msdh
                    },
                    dataType: "html",
                    success: function(data) {
                        $('.text-result-order').html('');
                        location.reload();
                    }
                });
            })
        }
        for (let i = 0; i < $('.btn-seen-order').length; i++) {
            $('.btn-seen-order').click(function() {
                var msdh = $(this).data('msdh');
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/seenOrder",
                    data: {
                        msdh: msdh
                    },
                    dataType: "html",
                    success: function(data) {
                        $('.text-result-order').html('');
                        location.reload();
                    }
                });
            })
        }
        $('.search-order').keyup(function() {
            var value = $(this).val();
            console.log(value);
            $.ajax({
                type: "post",
                url: "../../../../SusuSneaker/Ajax/searchOrderEdit",
                data: {
                    value: value
                },
                dataType: "html",
                success: function(data) {
                    $('.text-result-order').html("");
                    $('.text-resultsearch-order').html("");
                    $('.container-search').remove();
                    $('.click-all-order').trigger("click");
                    if (data == false) {
                        $('.text-resultsearch-order').html("Không tìm thấy đơn hàng");
                    } else {
                        $('#all-order').append(data);
                        for (let i = 0; i < $('.btn-confirm-order').length; i++) {
                            $('.btn-confirm-order').click(function() {
                                var msdh = $(this).data('msdh');
                                $.ajax({
                                    type: "post",
                                    url: "../../../../SusuSneaker/Ajax/confirmOrder",
                                    data: {
                                        msdh: msdh
                                    },
                                    dataType: "html",
                                    success: function(data) {
                                        $('.text-result-order').html('');
                                        location.reload();
                                    }
                                });
                            })
                        }
                        for (let i = 0; i < $('.btn-cancel-order').length; i++) {
                            $('.btn-cancel-order').click(function() {
                                var msdh = $(this).data('msdh');
                                $.ajax({
                                    type: "post",
                                    url: "../../../../SusuSneaker/Ajax/cancelOrder",
                                    data: {
                                        msdh: msdh
                                    },
                                    dataType: "html",
                                    success: function(data) {
                                        $('.text-result-order').html('');
                                        location.reload();
                                    }
                                });
                            })
                        }
                        for (let i = 0; i < $('.btn-seen-order').length; i++) {
                            $('.btn-seen-order').click(function() {
                                var msdh = $(this).data('msdh');
                                $.ajax({
                                    type: "post",
                                    url: "../../../../SusuSneaker/Ajax/seenOrder",
                                    data: {
                                        msdh: msdh
                                    },
                                    dataType: "html",
                                    success: function(data) {
                                        $('.text-result-order').html('');
                                        location.reload();
                                    }
                                });
                            })
                        }
                    } //close true
                } // close function success
            }); //close ajax
        })
        $('.click-detail-order').prop("disabled", true);
        for (let i = 0; i < $('.btn-detail-order').length; i++) {
            $($('.btn-detail-order').get(i)).click(function() {
                var msdh = $(this).data('msdh');
                $('.click-detail-order').prop("disabled", false);
                $('.click-detail-order').trigger('click');
                $('#detail-order').empty();
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/detailOrder",
                    data: {
                        msdh: msdh
                    },
                    dataType: "html",
                    success: function(data) {
                        $('#detail-order').append(data);
                        $('.click-detail-order').prop("disabled", true);
                    }
                });
            })
        }
    })
</script>