<div class="admin-addGroupItem d-flex flex-md-column justify-conten-center">
    <div class="row text-center pb-3 pt-3 mt-3 d-flex flex-row justify-content-center">
        <h2 class="text-center info title-admin font-weight-bold">Thêm nhóm sản phẩm</h2>
    </div>
    <form action="them nhom giay" style="width:60%; margin-left:20%" onsubmit="return false;" method="POST" id="dangki3" class="mt-3">
        <span class="text-success" id="result13"></span>
        <span class="error" id="result23"></span>
        <div class="banglogin">
            <label for="tennhomgiay3" class="mucdien">Tên nhóm giày</label>
            <input id="tennhomgiay3" required type="text" name="tennhomgiay3" class=" inputlogin form-control mt-1 mb-1" placeholder="Nhập tên nhóm">
            <span class="error" id="checkGroupItems3"></span>
        </div>
        <label for='thuonghieu3' class="">Thương hiệu</label>
        <select id="thuonghieu3" name="thuonghieu3" class="form-control" tabindex="4">
            <?php foreach ($data['getLargeGroup']->tenNhom as $key => $value) { ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <div class="w-25 mx-auto mt-5">
            <button name="registration" type="submit" class="btn btn-outline-secondary btn-block" value="Thêm sản phẩm">Thêm</button>
            <button id="reset3" type="reset" class="btn btn-outline-info btn-block mt-0" value="Làm mới">Làm mới</button>
        </div>
    </form>

</div>
<script>
    $(document).ready(function() {
        $('#dangki3').submit(function(e) {
            e.preventDefault();
            var tennhomgiay = $.trim($('#tennhomgiay3').val());
            var thuonghieugiay = $.trim($('#thuonghieu3').val());
            if ($('#checkGroupItems3').text() == "Nhóm giày đã tồn tại") {
                console.log(false);
            } else {
                $.post(
                    "../../SusuSneaker/Ajax/addGroupItem", {
                        tennhomgiay: tennhomgiay,
                        thuonghieugiay: thuonghieugiay
                    },
                    function(data) {
                        if (data == 'Thêm nhóm giày thành công') {
                            $('#result13').html(data);
                            $('#reset3').trigger('click');
                        } else {
                            $('#result23').html(data);
                            $('#reset3').trigger('click');
                        }
                    }
                )
            }

        })
    })

    $(document).ready(function() {
        $("#tennhomgiay3").keyup(function() {
            var value = $(this).val();
            // $("#checkUserName").html(value);
            $.post("../../SusuSneaker/Ajax/checkGroupItem", {
                    tennhomgiay: value
                },
                function(data) {
                    $("#checkGroupItems3").html(data);
                });
        });
    })
</script>