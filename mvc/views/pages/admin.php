<div class="container-fluid mb-5 pb-5">
    <div class="row">
        <div class="col-md-3 w-50 mb-5">
            <ul class="nav flex-column">
                <li class="nav-item color-visited">
                    <div class="nav-link disable text-center">ADMINISTRATION</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-item" data-toggle="tab" href="#">Sản phẩm <i class="fas fa-caret-right admin-triangle-item"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-item-child" style="display: none;" data-toggle="tab" href="#admin-addItem">Thêm sản phẩm <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-item-child" style="display: none;" data-toggle="tab" href="#admin-addGroupItem">Thêm nhóm sản phẩm <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-item-child" style="display: none;" data-toggle="tab" href="#admin-editItem">Chỉnh sửa sản phẩm <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-employee" data-toggle="tab" href="#menu1">Nhân viên <i class="fas fa-caret-right admin-triangle-employee"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-employee-child" style="display: none;" data-toggle="tab" href="#admin-addEmployee">Thêm nhân viên <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-employee-child" style="display: none;" data-toggle="tab" href="#admin-editEmployee">Chỉnh sửa nhân viên <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-customer" data-toggle="tab" href="#menu2">Khách hàng <i class="fas fa-caret-right admin-triangle-customer"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-customer-child" style="display: none;" data-toggle="tab" href="#admin-addCustomer">Thêm khách hàng <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item pl-5 admin-child">
                    <a class="nav-link admin-customer-child" style="display: none;" data-toggle="tab" href="#admin-editCustomer">Chỉnh sửa khách hàng <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-order admin-child active show" data-toggle="tab" href="#admin-order">Quản lý đơn hàng <i class="fas fa-caret-right admin-triangle-hide"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane container active show">
                    <div class="mx-auto display-4 mt-5 text-md-center">Chào mừng bạn đến với trang quản trị</div>
                </div>
                <div class="tab-pane container fade" id="admin-addItem">
                    <?php require "mvc/views/pages/admin/admin-addItem.php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-addGroupItem">
                    <?php require "mvc/views/pages/admin/admin-addGroupItem.php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-editItem">
                    <?php require "mvc/views/pages/admin/admin-editItem.php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-addEmployee">
                    <?php require "mvc/views/pages/admin/".$data['addEmployee'].".php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-editEmployee">
                    <?php require "mvc/views/pages/admin/".$data['editEmployee'].".php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-addCustomer">
                    <?php require "mvc/views/pages/admin/admin-addCustomer.php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-editCustomer">
                    <?php require "mvc/views/pages/admin/admin-editCustomer.php"; ?>
                </div>
                <div class="tab-pane container fade" id="admin-order">
                    <?php require "mvc/views/pages/admin/admin-order.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Tab panes -->