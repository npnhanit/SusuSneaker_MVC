<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Dùng edge mới nhất -->
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <!-- Reponsive trên thiết bị di đồng -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị</title>
    <link rel="stylesheet" type="text/css" href="../../../../SusuSneaker/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="../../../../SusuSneaker/public/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="../../../../SusuSneaker/public/javascript/login.js"></script>
    <script src="../../../../SusuSneaker/public/javascript/main.js"></script>
    <script src="../../../../SusuSneaker/public/javascript/admin.js"></script>
</head>

<body>
    <header class="header-admin navbar-area" id="header-admin">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">
                            <img src="../../../../SusuSneaker/public/image/logo_web.png" width="180" height="" class="d-inline-block align-top" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex flex-row justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link font-weight-bold text-header-admin title-admin" href="#item-admin-new">Sản phẩm</a>
                                <a class="nav-item nav-link font-weight-bold text-header-admin title-admin" href="#employee-admin-new">Nhân viên</a>
                                <a class="nav-item nav-link font-weight-bold text-header-admin title-admin" href="#customer-admin-new">Khách hàng</a>
                                <a class="nav-item nav-link font-weight-bold text-header-admin title-admin" href="#order-admin-new">Đơn hàng</a>
                                <a class="nav-item nav-link font-weight-bold text-header-admin title-admin" href="../../../../SusuSneaker/Process/logout">Đăng xuất</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- ========================= header end ========================= -->
    <!-- ========================= intro ========================= -->
    <section class='introduction-admin' id="introduction-admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <br>
                    <div class="col-lg-6 welcome-text-admin p-4 LtoR">
                        <b>
                            <h2 class='font-weight-bold text-center fadeInDown'>Chào mừng đến với trang quản trị</h2>
                        </b>
                        <hr>
                        <h4 class="text-center fadeInDown">Nơi thực hiện các chức năng quản trị website bán giày SusuSneaker</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= introduction end ========================= -->
    <!-- ========================= item ========================= -->
    <section class='item-admin-new admin-component' id="item-admin-new">
        <div class="container pb-5 h-100 item-admin-new-child scroll-view">
            <div class="row item-admin-new-left">
                <div class="bg-temp nav-tabs col-lg-12 w-100 fadeInDown">
                    <ul class="nav d-flex flex-row justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold p-2 title-admin active show" data-toggle="tab" href="#admin-addItem">Thêm sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold p-2 title-admin" data-toggle="tab" href="#admin-addGroupItem">Thêm nhóm sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold p-2 title-admin" data-toggle="tab" href="#admin-editItem">Chỉnh sửa sản phẩm</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row h-100">
                <div class="col-lg-12 item-admin-new-right overflow-auto fadeInDown">
                    <div class="admin-item-right-child scrollspy-example" data-spy="scroll">
                        <div class="tab-content">
                            <div class="tab-pane container active show" id="admin-addItem">
                                <?php require "mvc/views/pages/admin/admin-addItem.php"; ?>
                            </div>
                            <div class="tab-pane container fade" id="admin-addGroupItem">
                                <?php require "mvc/views/pages/admin/admin-addGroupItem.php"; ?>
                            </div>
                            <div class="tab-pane container fade" id="admin-editItem">
                                <?php require "mvc/views/pages/admin/admin-editItem.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= item end ========================= -->
    <section class='employee-admin-new admin-component' id="employee-admin-new">
        <div class="container pb-5 scroll-view employee-admin-new-child">
            <div class="row item-admin-new-left fadeInDown">
                <div class="col-lg-12 nav-tabs bg-temp h-100 w-100">
                    <ul class="nav d-flex flex-row justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold title-admin active show" data-toggle="tab" href="#admin-addEmployee">Thêm nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold title-admin" data-toggle="tab" href="#admin-editEmployee">Chỉnh sửa nhân viên</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row h-100">
                <div class="item-admin-new-right w-100 overflow-auto fadeInDown">
                    <div class="col-lg-12 admin-item-right-child scrollspy-example" data-spy="scroll">
                        <div class="tab-content">
                            <div class="tab-pane container active show" id="admin-addEmployee">
                                <?php require "mvc/views/pages/admin/" . $data['addEmployee'] . ".php";
                                ?>
                            </div>
                            <div class="tab-pane container fade" id="admin-editEmployee">
                                <?php require "mvc/views/pages/admin/" . $data['editEmployee'] . ".php";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='customer-admin-new admin-component' id="customer-admin-new">
        <div class="container pb-5 scroll-view customer-admin-new-child">
            <div class="row item-admin-new-left fadeInDown">
                <div class="bg-temp nav-tabs col-lg-12 h-100 w-100">
                    <ul class="nav d-flex flex-row justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold title-admin active show" data-toggle="tab" href="#admin-addCustomer">Thêm khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold title-admin" data-toggle="tab" href="#admin-editCustomer">Chỉnh sửa khách hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row h-100">
                <div class="col-lg-12 w-100 item-admin-new-right overflow-auto fadeInDown">
                    <div class="admin-item-right-child scrollspy-example" data-spy="scroll">
                        <div class="tab-content">
                            <div class="tab-pane container active show" id="admin-addCustomer">
                                <?php require "mvc/views/pages/admin/admin-addCustomer.php"; ?>
                            </div>
                            <div class="tab-pane container fade" id="admin-editCustomer">
                                <?php require "mvc/views/pages/admin/admin-editCustomer.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='order-admin-new admin-component' id="order-admin-new">
        <div class="container pb-5 h-100 scroll-view order-admin-new-child">
            <div class="row h-100 ">
                <div class="col-lg-12 item-admin-new-right overflow-auto fadeInDown
                ">
                    <div class="admin-item-right-child scrollspy-example" data-spy="scroll">
                        <div class="tab-content">
                            <div class="tab-pane container active show" id="admin-order">
                                <?php require "mvc/views/pages/admin/admin-order.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="back-to-top" class="back-to-top" data-placement="left" title="Trở lên đầu trang"><a href="#introduction-admin"><img src="../../../../SusuSneaker/public/image/helper/top.png" alt=""></a></div>

</body>

</html>