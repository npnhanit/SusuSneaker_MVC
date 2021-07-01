<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Dùng edge mới nhất -->
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <!-- Reponsive trên thiết bị di đồng -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="../../../../SusuSneaker/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="../../../../SusuSneaker/public/css/login.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="../../../../SusuSneaker/public/javascript/header.js"></script>
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
                        <a class="navbar-brand" href="../../../../SusuSneaker/Home/SayHi">
                            <img src="../../../../SusuSneaker/public/image/logo_web.png" width="180" height="" class="d-inline-block align-top" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex flex-row justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav font-weight-bold">
                                <a class="nav-item nav-link text-header-admin active" href="../../../../SusuSneaker/Home/SayHi">Trang chủ</a>
                                <a class="nav-item nav-link text-header-admin" href="../../../../SusuSneaker/Login/SayHi">Đăng nhập</a>
                                <a class="nav-item nav-link text-header-admin" href="../../../../SusuSneaker/Login/Register">Đăng ký</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- ========================= header end ========================= -->
    <section class='introduction-login' id="introduction-admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <br>
                    <div class="col-lg-6 welcome-text-login p-4 LtoR">
                        <b>
                            <h2 class='font-weight-bold text-center text-title-login fadeInDown'>Đăng ký</h2>
                        </b>
                        <hr>
                        <span class="text-danger text-left col-md-9 error pt-1 pb-1"></span>
                        <section class="get-in-touch">
                            <form id="formRegister" action="../../../../SusuSneaker/Process/registration" method="POST" class="contact-form row">
                                <div class="form-field col-lg-6">
                                    <input id="username" name="username" class="input-text js-input" type="text" required>
                                    <label class="label" for="username">Tên đăng nhập</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input id="fullname" class="input-text js-input" name="fullname" type="text" required>
                                    <label class="label" for="fullname">Họ và tên</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input id="password" name="password" class="input-text js-input" type="password" required>
                                    <label class="label" for="password">Mật khẩu</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input id="confirmpassword" name="confirmpassword" class="input-text js-input" type="password" required>
                                    <label class="label" for="confirmpassword">Nhập lại mật khẩu</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input id="phoneRegister" name="phone" class="input-text js-input" type="text" required>
                                    <label class="label" for="phoneRegister">Số điện thoại</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <input id="address" class="input-text js-input" name="address" type="text" required>
                                    <label class="label" for="address">Địa chỉ</label>
                                </div>
                                <div class="form-field col-lg-6">
                                    <select required placeholder="" style="font-family: Courier New, Helvetica, Arial, Times New Roman, Tahoma, Geneva, Verdana, sans-serif;" name="province" class="w-100 input-text province-register pl-1">
                                        <option value="" class="input-text" selected disabled hidden>Chọn Tỉnh/Thành Phố</option>
                                    </select>
                                </div>
                                <div class="form-field col-lg-6">
                                    <select required placeholder="" style="font-family: Courier New, Helvetica, Arial, Times New Roman, Tahoma, Geneva, Verdana, sans-serif;" name="district" class="w-100 input-text district-register pl-1">
                                        <option value="" class="input-text" selected disabled hidden>Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="form-field col-lg-6">
                                    <select required placeholder="" style="font-family: Courier New, Helvetica, Arial, Times New Roman, Tahoma, Geneva, Verdana, sans-serif;" name="ward" class="w-100 input-text ward-register pl-1">
                                        <option value="" class="input-text" selected disabled hidden>Chọn Chọn Xã/Phường</option>
                                    </select>
                                </div>
                                <div class="form-field col-lg-12 d-flex flex-row justify-content-center">
                                    <input class="submit-btn btn-register" name="register" type="submit" value="Đăng ký">
                                </div>
                                <hr>
                                <a href="../../../../SusuSneaker/Login/SayHi" class="mt-2 form-field col-lg-12 d-flex flex-row justify-content-center">
                                    <input class="submit-btn text-center" type="button" value="Đăng nhập">
                                </a>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= introduction end ========================= -->
</body>
<script src="../../../../SusuSneaker/public/javascript/register.js"></script>