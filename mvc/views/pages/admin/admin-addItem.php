<div id="addsp mt-0 pt-0">
    <div class="row text-center pb-3 pt-3 mt-3 d-flex flex-row justify-content-center">
        <h2 class="text-center info title-admin font-weight-bold">Thêm sản phẩm</h2>
    </div>
    <form id="form-addItem" action="" onsubmit="return false;" method="POST" enctype="multipart/form-data">
        <span class="text-success" id="result14"></span>
        <span class="error" id="result24"></span>
        <div class="ndform d-flex flex-md-column justify-content-end">
            <label for='tensanpham' class="">Nhập tên sản phẩm</label>
            <input required id="tensanpham" type="text" tabindex="1" name="tensanpham" class="form-control" placeholder="Nhập tên sản phẩm bạn muốn thêm vào">
            <br>
            <label for='giasanpham' class="">Giá sản phẩm</label>
            <input required id="giasanpham" type="number" name="giasanpham" tabindex="2" class="form-control" placeholder="Nhập giá sản phẩm">
            <br>
            <label for='soluong' class="">Số lượng</label>

            <div class="div-soluong">
                &#160;<label for="">&ensp; Size <br> <label for="">&ensp;</label></label>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="36" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;36</label>
                    </div>
                    <input disabled type="number" min=1 name="36" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="37" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;37</label>
                    </div>
                    <input disabled type="number" min=1 name="37" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="38" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;38</label>
                    </div>
                    <input disabled type="number" min=1 name="38" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="39" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;39</label>
                    </div>
                    <input disabled type="number" min=1 name="39" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="40" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;40</label>
                    </div>
                    <input disabled type="number" min=1 name="40" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="41" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;41</label>
                    </div>
                    <input disabled type="number" min=1 name="41" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="42" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;42</label>
                    </div>
                    <input disabled type="number" min=1 name="42" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="43" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;43</label>
                    </div>
                    <input disabled type="number" min=1 name="43" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="44" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;44</label>
                    </div>
                    <input disabled type="number" min=1 name="44" class="check-sl form-control">
                </div>
                <div style="width: 10%;" class="d-inline-block ml-5">
                    <div class="">
                        <input type="checkbox" style="width: 15px;" name="size[]" value="45" class="check-sl form-control ml-3"><label for="size36" class="mb-0">&#160;45</label>
                    </div>
                    <input disabled type="number" min=1 name="45" class="check-sl form-control">
                </div>
            </div>

            <br>
            <label for='theloai' class="">Thể loại</label>
            <select id="theloai" name="theloai" class="form-control" tabindex="4">
                <?php foreach ($data['getLargeGroup']->maNhom as $key => $value) { ?>
                    <optgroup label=<?php echo '"' . $data['getLargeGroup']->tenNhom[$key] . '"'; ?>>
                        <?php foreach ($data['getGroupItems']->maThuongHieu as $key1 => $value1) {
                            if ($value1 == $value) { ?>
                                <option value=<?php echo '"' . $data['getGroupItems']->tenNhom[$key1] . '"'; ?>><?php echo "&emsp;" . $data['getGroupItems']->tenNhom[$key1]; ?></option>
                    </optgroup>
        <?php }
                        }
                    } ?>
            </select>
            <br>
            <label for='mota' class="">Mô tả</label>
            <textarea id="mota" required type="text" name="mota" class="form-control" tabindex="5" cols="30" rows="7" placeholder="Nhập mô tả sản phẩm"></textarea>
            <br>
            <input required type="file" class="btn btn-outline-info btn-block" name="file[]" multiple="multiple" tabindex="6" placeholder="Ảnh sản phẩm">Chọn hình ảnh sản phẩm</inpu>
            <br>
            <div class="w-25 mx-auto mb-5">
                <button name="addItem" id="addItem" type="submit" class="btn btn-outline-secondary btn-block" value="Thêm sản phẩm">Thêm sản phẩm</button>
                <button id="reset4" type="reset" class="btn btn-outline-info btn-block mt-0" value="Làm mới">Làm mới</button>
            </div>
        </div>
    </form>

</div>
<script>
    // console.log($('#form-addItem'));
    $('#form-addItem').submit(function() {
        var formData = new FormData(document.getElementById("form-addItem"));
        $.ajax({
            type: "POST",
            data: formData,
            url: "../../../../SusuSneaker/Ajax/addItem",
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(data) {
                // console.log(data);
                if (data == 'Thêm sản phẩm thành công') {
                    $('#result14').html(data);
                    $('#result24').html("");
                    $('#reset4').trigger('click');
                    location.reload();
                } else {
                    $('#result24').html(data);
                    $('#reset4').trigger('click');
                }
            },
            error: function(data) {
                $('#result24').html(data);
                $('#reset1').trigger('click');
            }
        });
    })
    $(document).ready(function() {
        for (let i = 0; i < $('.check-sl').length; i = i + 2) {
            $('.check-sl').get(i).addEventListener('change', function(event) {
                event.preventDefault();
                if (this.checked) {
                    $('.check-sl').get(i + 1).disabled = false;
                } else {
                    $('.check-sl').get(i + 1).disabled = true;
                }
            })
        }
    })
</script>