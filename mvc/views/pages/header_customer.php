<div class="login_register_icon d-flex flex-md-row justify-content-center">
    <div class="dropdown">
        <img class="img-circle dropdown-toggle" width="70px" src="<?php echo $data['json_infoUser']->avatar; ?>" alt="">
        <div class='dropdown-menu' style="padding-bottom: 0px;">
            <a href="../../../../SusuSneaker/Product/User/Info/<?php echo $data['json_infoUser']->idUser; ?>" class="dropdown-item"><i style="color:  #5F7982;" class="fas fa-user"></i> Thông tin cá nhân</a>
            <a href="../../../../SusuSneaker/Product/User/Order/<?php echo $data['json_infoUser']->idUser; ?>" class="dropdown-item"><i style="color:  #5F7982;" class="fas fa-sort-amount-down"></i> Theo dõi đơn hàng</a>
            <a href="../../../../SusuSneaker/Process/logout" class="dropdown-item"><i style="color:  #5F7982;" class="fas fa-sign-in-alt"></i> Đăng xuất</a>
            <div class='dropdown-item end'></div>
        </div>
    </div>
</div>