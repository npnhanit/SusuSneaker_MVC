<div class="">
    <div class="row text-center mt-3 d-flex flex-row justify-content-center">
        <h2 class="text-center info title-admin font-weight-bold">Thông tin nhân viên</h2>
    </div>
    <div class="row bg-main m-0">
        <div class="col-md-6 offset-md-3 p-3 ">
            <input class="form-control search-employee" type="text" placeholder="Nhập tên tài khoản bạn muốn tìm">
            <span class='text-success text-resultedit-employee'></span>
        </div>
    </div>
    <table class="table table-hover p-3 table-edit-employee">
        <thead>
            <tr class='title-table'>
                <th class="text-center">MSKH</th>
                <th class="text-center">Tên đăng nhập</th>
                <th class="text-center">Tên Nhân viên</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">Trạng thái</th>
            </tr>
        </thead>
        <tbody class="tbody-edit-employee">
            <?php foreach ($data['full_employee']->idNV as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?php echo $value; ?></td>
                    <td class="text-center"><?php echo $data['full_employee']->tendangnhap[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_employee']->tennhanvien[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_employee']->sodienthoai[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_employee']->diachi[$key] . ', ' . $data['full_employee']->xaphuong[$key] . ', ' . $data['full_employee']->quanhuyen[$key] . ', ' . $data['full_employee']->tinhthanh[$key]; ?></td>
                    <td class="text-center">
                        <select class="select-state-edit-employee" data-MSNV="<?php echo $data['full_employee']->tendangnhap[$key]; ?>">
                            <option value="Đang hoạt động" <?php if($data['full_employee']->idGroup[$key] == 1) echo "selected='selected'" ?> class="">Đang hoạt động</option>
                            <option value="Dừng hoạt động" <?php if($data['full_employee']->idGroup[$key] == 3) echo "selected='selected'" ?> class=''>Dừng hoạt động</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        for(let i = 0; i < $('.select-state-edit-employee').length; i++){
            $($('.select-state-edit-employee').get(i)).change(function(){
                var msnv = $(this).data('msnv');
                var state = $(this).val();
                $.ajax({
                    type: "post",
                    url: "../../../../SusuSneaker/Ajax/updateState",
                    data: {
                        msnv: msnv,
                        state: state
                    },
                    dataType: "html",
                    success: function (data) {
                        $('.text-resultedit-employee').html();
                        if(data == '1'){
                            $('.text-resultedit-employee').html("Cập nhật thành công");
                        }
                    }
                });
            })
        }
        $('.search-employee').keyup(function() {
            var username = $(this).val();
            $.ajax({
                type: "post",
                url: "../../../../SusuSneaker/Ajax/searchEmployee",
                data: {
                    username: username
                },
                dataType: "html",
                success: function(data) {
                    $('.text-resultedit-employee').html("");
                    $('.tbody-edit-employee').remove();
                    if (data == "false") {
                        $('.text-resultedit-username').html('Không tìm thấy tài khoản khách hàng');
                    } else {
                        $('.table-edit-employee').append(data);
                    }
                }
            });
        })
    })
</script>