<div class="items ml-5 mr-5 mt-5">
    <div class="max-container container mt-5 pt-1">
        <div id="<?php echo $value; ?>" class="item-group mt-4 d-flex flex-row justify-content-center">
            <div class="item-group text-center fadeInDown m-auto">
                <div class="m-auto p-3" style="border-bottom: 1px solid black; border-top: 1px solid black; "><?php echo $data['nameGroup'] ?></div>
            </div>
        </div>

        <div href="#" class="items-list">
            <?php
            if ($data['json_items_group']) {
                foreach ($data['json_items_group']->tenNhom as $keyitems => $valueitems) {
            ?>
                    <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_items_group']->MSHH[$keyitems]; ?>" class="item1 p-2">
                        <div class="item-image m-auto pt-1"><img width="250px" height="250px" src=<?php echo '"' . $data['json_items_group']->srcHinh[$keyitems] . '"' ?> alt=""></div>
                        <div class="item-name m-auto font-weight-bold"><?php echo $data['json_items_group']->TenHH[$keyitems]; ?></div>
                        <div class="item-price m-auto font-weight-bold"><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['json_items_group']->Gia[$keyitems]); ?></div>
                    </a>
            <?php
                }
            } else {
                echo "Không có sản phẩm để hiển thị";
            }
            ?>
        </div>
    </div>
</div>