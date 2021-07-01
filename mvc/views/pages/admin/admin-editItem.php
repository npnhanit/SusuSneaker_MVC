<div class="view-edit-item m-0 p-0 position-absolute w-100 fadeInDown" style="display: none;">
    <div class="position-absolut btn-exit-edit-image fadeInDown">
        <button class="btn btn-outline-danger">X</button>
    </div>
    <div class="row text-center pb-3 pt-3 mt-3 d-flex flex-row justify-content-center fadeInDown">
        <h2 class="text-center info title-admin font-weight-bold">Cập nhật hình ảnh sản phẩm</h2>
    </div>
    <h5 class="title-admin pl-5 fadeInDown">Tên sản phẩm: <span class="view-name-editimageitem"></span></h5>
    <h5 class="title-admin pl-5 fadeInDown">Hình ảnh sản phẩm</h5>
    <span class="warning-delete-image text-warning pl-5 fadeInDown"></span>
    <div class="mt-3 ml-5 mr-5 mb-0">
        <div class="p-2 items-list overflow-auto list-image fadeInDown">
        </div>
    </div>
    <div class="row d-flex flex-row justify-content-center container-formUpdateImage">

    </div>
</div>
<div class="">
    <div class="row text-center pb-3 pt-3 mt-3 d-flex flex-row justify-content-center">
        <h2 class="text-center info title-admin">Chỉnh sửa sản phẩm</h2>
    </div>
    <div class="row bg-main p-3">
        <div class="col-md-6 offset-md-3">
            <input class="form-control search-item-edit" type="text" placeholder="Nhập tên giày bạn muốn tìm">
            <span class='text-success text-result-updateitem'></span>
            <span class='text-danger text-result-updateitemfalse'></span>
            <span class='text-warning text-result-searchitemfalse'></span>
        </div>
    </div>
    <div class="row">
        <table class="table table-edit-item">
            <thead class="thead-light">
                <tr>
                    <th class='text-center'>STT</th>
                    <th class='text-center'>Tên giày</th>
                    <th class='text-center'>Giá</th>
                    <th class='text-center'>Thương hiệu</th>
                    <th class='text-center'>&emsp;&emsp;&emsp;&emsp;Size&emsp;&emsp;</th>
                    <th class='text-center'>Số lượng</th>
                    <th class='text-center'>Cập nhật</th>
                    <th class='text-center'>Hết hàng</th>
                </tr>
            </thead>
            <tbody class='tbody-edit-item'>
                <?php
                $stt = 0;
                foreach ($data['item_edit']->MSHH as $key => $value) {
                    $stt++;
                ?>
                    <tr>
                        <td class='text-center'><?php echo $stt; ?></td>
                        <td><?php echo $data['item_edit']->TenHH[$key]; ?> <br> <span data-MSHH=<?php echo $value; ?> class='text-edit-image'>Hình ảnh</span></td>
                        <td class='text-center'><input type="number" class='w-75 price-edit' value="<?php echo $data['item_edit']->Gia[$key]; ?>"></td>
                        <td class='text-center'><?php echo $data['item_edit']->tenNhom[$key]; ?></td>
                        <td class='text-center'>
                            <select data-MSHH="<?php echo $data['item_edit']->MSHH[$key]; ?>" class="form-control select-size-edit-item w-100" data-MSHH="<?php echo $data['item_edit']->MSHH[$key]; ?>">
                                <?php
                                foreach ($data['full_size']->MSHH as $key1 => $value1) {
                                    if ($value1 == $value) {
                                ?>
                                        <option class="w-100" value="<?php echo "" . $data['full_size']->size[$key1]; ?>"><?php echo $data['full_size']->size[$key1]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td class='d-flex flex-row justify-content-center'>
                            <?php
                            foreach ($data['full_size']->MSHH as $key2 => $value2) {
                                if ($value2 == $value && $data['full_size']->size[$key2] == 36) {
                            ?>
                                    <input type="number" class="w-75 size-edit" value="<?php echo $data['full_size']->soLUong[$key2]; ?>">
                            <?php
                                }
                            }
                            ?>
                        </td>
                        <td class='text-center'>
                            <button class="btn-outline-success p-1 h-100 w-75 text-center btn-update-item">O</button>
                        </td>
                        <td class='text-center'>
                            <button class="btn-outline-danger p-1 h-100 w-75 text-center btn-delete-item">X</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        for (let i = 0; i < $('.select-size-edit-item').length; i++) {
            $($(".select-size-edit-item").get(i)).change(function() {
                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                var size = $($(".select-size-edit-item").get(i)).val();
                console.log(size);
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/getAmount",
                    data: {
                        mshh: mshh,
                        size: size
                    },
                    dataType: "html",
                    success: function(data) {
                        $('.text-result-updateitem').html("");
                        $('.text-result-updateitemfalse').html("");
                        $('.text-result-searchitemfalse').html("");
                        $($('.size-edit').get(i)).val(data);
                    }
                }); // close ajax
            }) // close change
        } // close for


        for (let i = 0; i < $('.btn-update-item').length; i++) {
            $($('.btn-update-item').get(i)).click(function() {
                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                var size = $($(".select-size-edit-item").get(i)).val();
                var soLuong = $($('.size-edit').get(i)).val();
                var gia = $($('.price-edit').get(i)).val();
                $.ajax({
                    type: 'post',
                    url: '../../../../SusuSneaker/Ajax/updateItem',
                    dataType: "html",
                    data: {
                        mshh: mshh,
                        size: size,
                        soLuong: soLuong,
                        gia: gia
                    },
                    success: function(data) {
                        $('.text-result-updateitem').html("");
                        $('.text-result-updateitemfalse').html("");
                        $('.text-result-searchitemfalse').html("");
                        if (data == '1') {
                            $('.text-result-updateitem').html("Cập nhật sản phẩm thành công");
                        } else {
                            $('.text-result-updateitemfalse').html("Lỗi khi cập nhật sản phẩm");
                        }

                    }
                }); // close ajax
            }) // close change
        } // close for

        for (let i = 0; i < $('.btn-delete-item').length; i++) {
            $($('.btn-delete-item').get(i)).click(function() {
                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: "../../../../SusuSneaker/Ajax/deleteItem",
                    data: {
                        mshh: mshh
                    },
                    success: function(data) {
                        $('.text-result-updateitem').html("");
                        $('.text-result-updateitemfalse').html("");
                        $('.text-result-searchitemfalse').html("");
                        if (data == '1') {
                            $('.text-result-updateitem').html("Xoá sản phẩm thành công");
                            $($('.size-edit').get(i)).val("0");
                        } else {
                            $('.text-result-updateitemfalse').html("Lỗi khi xoá sản phẩm");
                        }
                    }
                }); // close ajax
            }) // close change
        } // close for

        $('.search-item-edit').keyup(function() {
            var value = $(this).val();
            $.ajax({
                type: "post",
                url: "../../../../SusuSneaker/Ajax/searchItemEdit",
                data: {
                    value: value
                },
                dataType: "html",
                success: function(data) {
                    $('.text-result-updateitem').html("");
                    $('.text-result-updateitemfalse').html("");
                    $('.text-result-searchitemfalse').html("");
                    $('.tbody-edit-item').remove();
                    if (data == false) {
                        $('.text-result-searchitemfalse').html("Không tìm thấy sản phẩm");
                    } else {
                        $('.table-edit-item').append(data);
                        for (let i = 0; i < $('.select-size-edit-item').length; i++) {
                            $($(".select-size-edit-item").get(i)).change(function() {
                                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                                var size = $($(".select-size-edit-item").get(i)).val();
                                $.ajax({
                                    type: "post",
                                    url: "../../../../SusuSneaker/Ajax/getAmount",
                                    data: {
                                        mshh: mshh,
                                        size: size
                                    },
                                    dataType: "html",
                                    success: function(data) {
                                        $('.text-result-updateitem').html("");
                                        $('.text-result-updateitemfalse').html("");
                                        $('.text-result-searchitemfalse').html("");
                                        $($('.size-edit').get(i)).val(data);
                                    }
                                }); // close ajax
                            }) // close change
                        } // close for
                        for (let i = 0; i < $('.btn-update-item').length; i++) {
                            $($('.btn-update-item').get(i)).click(function() {
                                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                                var size = $($(".select-size-edit-item").get(i)).val();
                                var soLuong = $($('.size-edit').get(i)).val();
                                var gia = $($('.price-edit').get(i)).val();
                                $.ajax({
                                    type: 'post',
                                    url: '../../../../SusuSneaker/Ajax/updateItem',
                                    dataType: "html",
                                    data: {
                                        mshh: mshh,
                                        size: size,
                                        soLuong: soLuong,
                                        gia: gia
                                    },
                                    success: function(data) {
                                        $('.text-result-updateitem').html("");
                                        $('.text-result-updateitemfalse').html("");
                                        $('.text-result-searchitemfalse').html("");
                                        if (data == '1') {
                                            $('.text-result-updateitem').html("Cập nhật sản phẩm thành công");
                                        } else {
                                            $('.text-result-updateitemfalse').html("Lỗi khi cập nhật sản phẩm");
                                        }

                                    }
                                }); // close ajax
                            }) // close change
                        } // close for

                        for (let i = 0; i < $('.btn-delete-item').length; i++) {
                            $($('.btn-delete-item').get(i)).click(function() {
                                var mshh = $($('.select-size-edit-item').get(i)).data('mshh');
                                $.ajax({
                                    type: "post",
                                    dataType: "html",
                                    url: "../../../../SusuSneaker/Ajax/deleteItem",
                                    data: {
                                        mshh: mshh
                                    },
                                    success: function(data) {
                                        $('.text-result-updateitem').html("");
                                        $('.text-result-updateitemfalse').html("");
                                        $('.text-result-searchitemfalse').html("");
                                        if (data == '1') {
                                            $('.text-result-updateitem').html("Xoá sản phẩm thành công");
                                            $($('.size-edit').get(i)).val("0");
                                        } else {
                                            $('.text-result-updateitemfalse').html("Lỗi khi xoá sản phẩm");
                                        }
                                    }
                                }); // close ajax
                            }) // close change
                        } // close for
                        for (let i = 0; i < $('.text-edit-image').length; i++) {
                            $($('.text-edit-image').get(i)).click(function() {
                                $('.text-warning').html('');
                                var mshh = $(this).data('mshh');
                                $('.view-edit-item').addClass('d-block');
                                $('.container-formUpdateImage').empty();
                                $('.container-formUpdateImage').append(`
                        <form id="formUpdateImageItem" action="" method="post">
                            <input type="text" class='input-temp d-none' value="" name="mshh">
                            <br>
                            <input required type="file" class="btn btn-outline-info btn-block" name="file[]" multiple="multiple" tabindex="6" placeholder="Ảnh sản phẩm">
                            <div class="w-25 mx-auto mb-2">
                                <button name="addImgItem" id="addImgItem" type="submit" class="btn btn-outline-secondary btn-block" value="Thêm sản phẩm">Cập nhật</button>
                            </div>
                        </form>
                `);
                                $('#formUpdateImageItem').submit(function() {
                                    var formUpdateImageItem = new FormData(document.getElementById("formUpdateImageItem"));
                                    $.ajax({
                                        type: "post",
                                        url: "../../../../SusuSneaker/Ajax/UpdateImageItem",
                                        data: formUpdateImageItem,
                                        contentType: false,
                                        processData: false,
                                        headers: {
                                            "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            if (data == 'Thêm hình ảnh thành công') {
                                                console.log("hihi");
                                                $($('.text-edit-image').get(i)).trigger('click');
                                            } else {
                                                console.log("haha");
                                                $($('.text-edit-image').get(i)).trigger('click');
                                            }
                                        },
                                        error: function(data) {
                                            console.log("hehe");
                                            $($('.text-edit-image').get(i)).trigger('click');
                                        }
                                    });
                                    return false;
                                });
                                $.ajax({
                                    type: "post",
                                    url: "../../../../SusuSneaker/Ajax/getEditImage",
                                    data: {
                                        mshh: mshh
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        $('.input-temp').val(mshh);
                                        $('.view-name-editimageitem').html(data.tensanpham[0]);
                                        $('.list-image').empty();
                                        var countImage = data.tensanpham.length;
                                        for (let i = 0; i < data.tensanpham.length; i++) {
                                            var array = data.srcHinh[i].split('/');
                                            $('.list-image').append(`
                        <div class="img-remove d-flex flex-column justify-content-center position-relative w-25 p-2">
                            <img data-MSHH="` + mshh + `" data-SRCHINH="` + data.srcHinh[i] + `" class="img-x position-absolute" style="opacity: 0.8; top: 0;width: 100%;" src="../../../../SusuSneaker/public/image/helper/x.png" alt="">
                            <div class="w-100">
                                <img width="100%" height="170px" src="` + data.srcHinh[i] + `" alt="">
                                <div style="overflow: hidden;" class="name-item">` + array[array.length - 1] + `</div>
                            </div>
                        </div>
                        `);
                                        }
                                        if (countImage > 1) {
                                            for (let j = 0; j < $('.img-x').length; j++) {
                                                $($('.img-x').get(j)).click(function() {
                                                    var mshh = $(this).data('mshh');
                                                    var srchinh = $(this).data('srchinh');
                                                    $.ajax({
                                                        type: "post",
                                                        url: "../../../../SusuSneaker/Ajax/deteleImageItem",
                                                        data: {
                                                            mshh: mshh,
                                                            srchinh: srchinh
                                                        },
                                                        dataType: "html",
                                                        success: function(data) {
                                                            console.log(data);
                                                            if (data == true) {
                                                                $($('.text-edit-image').get(i)).trigger('click');
                                                            } else {

                                                            }
                                                        }
                                                    });
                                                })
                                            }
                                        } else {
                                            $('.text-warning').html("*Một sản phẩm có ít nhất 1 ảnh");
                                        }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            })
                        }
                        $('.btn-exit-edit-image').click(function() {
                            $('.text-warning').html('');
                            $('.view-name-editimageitem').html('');
                            $('.list-image').empty();
                            $('.view-edit-item').removeClass('d-block');
                        })
                    } //close true
                } // close function success
            }); //close ajax
        }) //close search

        for (let i = 0; i < $('.text-edit-image').length; i++) {
            $($('.text-edit-image').get(i)).click(function() {
                $('.text-warning').html('');
                var mshh = $(this).data('mshh');
                $('.view-edit-item').addClass('d-block');
                $('.item-admin-new-right').animate({
                    scrollTop: $(".view-edit-item").offset().top - 25
                }, 500);
                $('.container-formUpdateImage').empty();
                $('.container-formUpdateImage').append(`
                        <form id="formUpdateImageItem" action="" method="post">
                            <input type="text" class='input-temp d-none' value="" name="mshh">
                            <br>
                            <input required type="file" class="btn btn-outline-info btn-block" name="file[]" multiple="multiple" tabindex="6" placeholder="Ảnh sản phẩm">
                            <div class="w-25 mx-auto mb-2">
                                <button name="addImgItem" id="addImgItem" type="submit" class="btn btn-outline-secondary btn-block" value="Thêm sản phẩm">Cập nhật</button>
                            </div>
                        </form>
                `);
                $('#formUpdateImageItem').submit(function() {
                    var formUpdateImageItem = new FormData(document.getElementById("formUpdateImageItem"));
                    $.ajax({
                        type: "post",
                        url: "../../../../SusuSneaker/Ajax/UpdateImageItem",
                        data: formUpdateImageItem,
                        contentType: false,
                        processData: false,
                        headers: {
                            "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(data) {
                            console.log(data);
                            if (data == 'Thêm hình ảnh thành công') {
                                console.log("hihi");
                                $($('.text-edit-image').get(i)).trigger('click');
                            } else {
                                console.log("haha");
                                $($('.text-edit-image').get(i)).trigger('click');
                            }
                        },
                        error: function(data) {
                            console.log("hehe");
                            $($('.text-edit-image').get(i)).trigger('click');
                        }
                    });
                    return false;
                });
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/getEditImage",
                    data: {
                        mshh: mshh
                    },
                    dataType: "json",
                    success: function(data) {
                        $('.input-temp').val(mshh);
                        $('.view-name-editimageitem').html(data.tensanpham[0]);
                        $('.list-image').empty();
                        var countImage = data.tensanpham.length;
                        for (let i = 0; i < data.tensanpham.length; i++) {
                            var array = data.srcHinh[i].split('/');
                            $('.list-image').append(`
                        <div class="img-remove d-flex flex-column justify-content-center position-relative w-25 p-2">
                            <img data-MSHH="` + mshh + `" data-SRCHINH="` + data.srcHinh[i] + `" class="img-x position-absolute" style="opacity: 0.8; top: 0;width: 100%;" src="../../../../SusuSneaker/public/image/helper/x.png" alt="">
                            <div class="w-100">
                                <img width="100%" height="170px" src="` + data.srcHinh[i] + `" alt="">
                                <div style="overflow: hidden;" class="name-item">` + array[array.length - 1] + `</div>
                            </div>
                        </div>
                        `);
                        }
                        if (countImage > 1) {
                            for (let j = 0; j < $('.img-x').length; j++) {
                                $($('.img-x').get(j)).click(function() {
                                    var mshh = $(this).data('mshh');
                                    var srchinh = $(this).data('srchinh');
                                    $.ajax({
                                        type: "post",
                                        url: "../../../../SusuSneaker/Ajax/deteleImageItem",
                                        data: {
                                            mshh: mshh,
                                            srchinh: srchinh
                                        },
                                        dataType: "html",
                                        success: function(data) {
                                            console.log(data);
                                            if (data == true) {
                                                $($('.text-edit-image').get(i)).trigger('click');
                                            } else {

                                            }
                                        }
                                    });
                                })
                            }
                        } else {
                            $('.text-warning').html("*Một sản phẩm có ít nhất 1 ảnh");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
        }
        $('.btn-exit-edit-image').click(function() {
            $('.text-warning').html('');
            $('.view-name-editimageitem').html('');
            $('.list-image').empty();
            $('.view-edit-item').removeClass('d-block');
        })

    })
</script>