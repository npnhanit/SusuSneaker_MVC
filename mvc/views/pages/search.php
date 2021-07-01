<div class="items">
    <div class="display-4 ml-3 p-3 font-weight-bold">Kết quả tìm kiếm <?php echo "'" . $data['json_search']->keyword . "'"; ?></div>
    <div class="max-container container">

    <?php 
    if(isset($data['json_search']->tenThuongHieu)){
        foreach($data['json_group_search']->tenThuongHieu as $key => $value){ 
    ?>
        <div class="item-group">
            <div class='pl-3'><i class="fas fa-angle-double-right fa-1x"></i></div>
            <div class="pl-5 m-auto"><?php echo $value ?></div>
        </div>
        <div href="#" class="items-list">
            <?php foreach($data['json_search']->tenThuongHieu as $keyitems => $valueitems){ 
                    if($valueitems == $value){    
            ?>
            <a href="#" class="item p-2">
                <div class="item-image m-auto pt-1"><img src=<?php echo '"' . $data['json_search']->srcHinh[$keyitems] . '"' ?> alt=""></div>
                <div class="item-name m-auto font-weight-bold"><?php echo $data['json_search']->TenHH[$keyitems]; ?></div>
                <div class="item-price m-auto font-weight-bold"><i class="fas fa-coins"></i>&#160;<?php echo number_format($data['json_search']->Gia[$keyitems]); ?></div>
            </a>
            <?php }} ?>
        </div>
        
    <?php }
    }else{
        echo '<div class="text-center">Không tìm thấy sản phẩm <i class="fas fa-sad-tear"></i></div>';
    }
    ?>
    </div>
</div>