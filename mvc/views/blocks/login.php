<form action="../../../../SusuSneaker/Process/login" method="POST">
    <div class="banglogin">
        <div class="mucdien">Tên đăng nhập</div>
        <input required name="username" type="text" class="inputlogin form-control" placeholder="Nhập tên đăng nhập">
        <div class="mucdien">Password</div>
        <input required name="password" type="password" class="inputlogin form-control" placeholder="Nhập mật khẩu">
        <input class="d-none" type="text" name='urlpre' value="<?php echo $_GET['url']; ?>">
        <div class="sb">
            <input name="login" type="submit" class="submit mucdien" value="Đăng nhập">
            <input name="trove" type="reset" class="submit mucdien" value="Làm mới">
        </div>
    </div>
</form>