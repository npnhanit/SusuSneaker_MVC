<div class="container-fuild m-5" style="height: 200px;">
    <div class="display-4 text-center review fadeInDown">
        <div class="text-center display-4 d-inline" style="border-bottom: 1px solid black;">Tại sao bạn nên chọn chúng tôi</div>
    </div>
    <div class="review row">
        <div class="col-lg-6 p-5 review h-100 LtoR text-right">
            <h1>Uy tín</h1>
            <h6>Kiểm tra giày trước khi thanh toán</h6>
        </div>
        <div class="col-lg-6 p-5 review h-100 RtoL text-left">
            <h1>Chất lượng</h1>
            <h6>Nói không với "đôn" hàng</h6>
        </div>
    </div>
</div>
<div class="max-container container">
    <?php foreach ($data['json_trade_mark']->tenNhom as $key => $value) { ?>
        <div class="item-home-display">
            <div class="item-group text-center LtoR">
                <div class="m-auto p-3" style="border-bottom: 1px solid black; border-top: 1px solid black; "><?php echo $value ?></div>
            </div>
            <div href="#" class="items-list fadeInDown">
                <?php foreach ($data['json_items']->tenThuongHieu as $keyitems => $valueitems) {
                    if ($valueitems == $value) {
                ?>
                        <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_items']->MSHH[$keyitems]; ?>" class="item1 p-2">
                            <div class="item-image m-auto pt-1"><img width="250px" height="250px" src=<?php echo '"' . $data['json_items']->srcHinh[$keyitems] . '"' ?> alt=""></div>
                            <div class="item-name m-auto font-weight-bold"><?php echo $data['json_items']->TenHH[$keyitems]; ?></div>
                            <div class="item-price m-auto font-weight-bold"><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['json_items']->Gia[$keyitems]); ?></div>
                        </a>
                <?php }
                } ?>
            </div>
        </div>

    <?php } ?>
</div>
<Script>
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        y += 600;
        if (y > $($('.review').get(0)).offset().top) {
            $($('.review').get(0)).fadeIn();
            $($('.review').get(1)).fadeIn();
            $($('.review').get(2)).fadeIn();
        } else {
            $($('.review').get(0)).fadeOut();
            $($('.review').get(1)).fadeOut();
            $($('.review').get(2)).fadeOut();
        }
    });
    for (let i = 0; i < $('.item-home-display').length; i++) {
        $($('.item-group').get(i)).fadeOut();
        $($('.items-list').get(i)).fadeOut();
    }
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        y += 750;
        for (let i = 0; i < $('.item-home-display').length; i++) {
            if (y > $($('.item-home-display').get(i)).offset().top) {
                $($('.item-group').get(i)).fadeIn();
                $($('.items-list').get(i)).fadeIn();
            } else {
                // $($('.item-group').get(i)).fadeOut();
                // $($('.items-list').get(i)).fadeOut();
            }
        }
    });
</Script>