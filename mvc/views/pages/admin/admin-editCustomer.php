<div class="container-fluid editCustomer-container p-0">
    <h2 class="text-center info title-admin mt-3 font-weight-bold" style="margin-bottom: 34px;">Thông tin khách hàng</h2>
    <div class="row bg-main m-0">
        <div class="col-md-6 offset-md-3 p-3 ">
            <input class="form-control search-username" type="text" placeholder="Nhập tên tài khoản bạn muốn tìm">
            <span class='text-warning text-resultsearch-username'></span>
        </div>
    </div>
    <table class="table table-hover p-3 table-edit-customer">
        <thead>
            <tr class='title-table'>
                <th class="text-center">MSKH</th>
                <th class="text-center">Tên đăng nhập</th>\
                <th class="text-center">Tên khách hàng</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
            </tr>
        </thead>
        <tbody class="tbody-edit-customer">
            <?php foreach ($data['full_customer']->idKH as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?php echo $value; ?></td>
                    <td class="text-center"><?php echo $data['full_customer']->tendangnhap[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_customer']->tenkhachhang[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_customer']->sodienthoai[$key]; ?></td>
                    <td class="text-center"><?php echo $data['full_customer']->diachi[$key] . ', ' . $data['full_customer']->xaphuong[$key] . ', ' . $data['full_customer']->quanhuyen[$key] . ', ' . $data['full_customer']->tinhthanh[$key]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        // for(let i = 0; i < $('.text-password').length; i++){
        //     $($('.text-password').get(i)).click(function(){
        //         $($('.text-password').get(i)).remove();
        //         $($('.refresh-password').get(i)).append('<input type="password" class="password-new" value=""> <br> <button class="btn btn-info mt-1">Cập nhật</button>');
                
        //     })
        // }
        $('.search-username').keyup(function() {
            var username = $(this).val();
            $.ajax({
                type: "post",
                url: "../../../../SusuSneaker/Ajax/searchUserName",
                data: {
                    username: username
                },
                dataType: "html",
                success: function(data) {
                    console.log(data);
                    $('.text-resultsearch-username').html("");
                    $('.tbody-edit-customer').remove();
                    if (data == "false") {
                        $('.text-resultsearch-username').html('Không tìm thấy tài khoản khách hàng');
                    } else {
                        $('.table-edit-customer').append(data);
                    }
                }
            });
        })

    })
</script>