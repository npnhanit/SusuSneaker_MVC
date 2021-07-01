<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Dùng edge mới nhất -->
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <!-- Reponsive trên thiết bị di đồng -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    
    <div id="main">
        <div class="background-black h-100 w-100"></div>
        <?php require_once "mvc/views/pages/" . $data['page'] . ".php"; ?>
    </div>
    <div id="footer">
        <div class="background-black h-100 w-100"></div>
        <?php require_once "mvc/views/blocks/footer.php"; ?>
    </div>
    <div class="manden hideformlogin d-flex flex-md-column justify-content-md-center">
        <?php require_once "mvc/views/blocks/loginform.php"; ?>
    </div>
    <div id="back-to-top" class="back-to-top" data-placement="left" title="Trở lên đầu trang"><img src="../../../../SusuSneaker/public/image/helper/top.png" alt=""></div>
    <div class="back-to-down"></div>
</body>
</html>