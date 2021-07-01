<div class="login_register_icon visitor">
    <i style="color:  #5F7982;" class="fas fa-sign-in-alt"></i>
    <a class="login-text" href="../../../../SusuSneaker/Login/SayHi">Đăng nhập |</a>
    <a class="registration-text" href="../../../../SusuSneaker/Login/Register">| Tạo tài khoản</a>
</div>
<script>
    // alert(window.localStorage.getItem('prePage'));
    $('.login_register_icon').click(function() {
        window.localStorage.setItem('prePage', $(location).attr('href'));
    })
</script>