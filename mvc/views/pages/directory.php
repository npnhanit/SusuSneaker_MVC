<div class="items ml-5 mr-5">
    <fieldset class="d-flex flex-md-row justify-content-md-center text-wrapping ">
        <legend class="display-4 display-inline"><?php echo $data['title']; ?></legend>
        <?php foreach ($data['json_group_trademark']->tenNhom as $key => $value) { ?>
            <a class="mr-5 h3 display-inline-block" href="#<?php echo $value ?>"><b>
                    <h4><i class="fas fa-folder-open"></i> <?php echo $value; ?></h4>
                </b></a>
        <?php } ?>
    </fieldset>
    <div class="max-container container mt-5">
        <?php
        foreach ($data['json_group_trademark']->tenNhom as $key => $value) {
        ?>
            <div id="<?php echo $value; ?>" class="item-group mt-4 d-flex flex-row justify-content-center">
                <div class="item-group text-center fadeInDown m-auto">
                    <div class="m-auto p-3" style="border-bottom: 1px solid black; border-top: 1px solid black; "><?php echo $value ?></div>
                </div>
            </div>
            <div href="#" class="items-list">
                <?php
                if ($data['json_items_trademark']) {
                    foreach ($data['json_items_trademark']->tenNhom as $keyitems => $valueitems) {
                        if ($valueitems == $value) {
                ?>
                            <a href="../../../../SusuSneaker/Product/Detail/<?php echo $data['json_items_trademark']->MSHH[$keyitems]; ?>" class="item1 p-2">
                                <div class="item-image m-auto pt-1"><img width="250px" height="250px" src=<?php echo '"' . $data['json_items_trademark']->srcHinh[$keyitems] . '"' ?> alt=""></div>
                                <div class="item-name m-auto font-weight-bold"><?php echo $data['json_items_trademark']->TenHH[$keyitems]; ?></div>
                                <div class="item-price m-auto font-weight-bold"><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['json_items_trademark']->Gia[$keyitems]); ?></div>
                            </a>
                <?php }
                    }
                } else {
                    echo "Không có sản phẩm để hiển thị";
                }
                ?>
            </div>

        <?php
        }

        ?>
    </div>
</div>