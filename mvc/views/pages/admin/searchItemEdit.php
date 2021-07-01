<tbody class='tbody-edit-item'>
    <?php
    $stt = 0;
    foreach ($getItems->MSHH as $key => $value) {
        $stt++;
    ?>
        <tr>
            <td class='text-center'><?php echo $stt; ?></td>
            <td><?php echo $getItems->TenHH[$key]; ?> <br> <span data-MSHH=<?php echo $value; ?> class='text-edit-image'>Hình ảnh</span></td>
            <td class='text-center'><input type="number" class='w-75 price-edit' value="<?php echo $getItems->Gia[$key]; ?>"></td>
            <td class='text-center'><?php echo $getItems->tenNhom[$key]; ?></td>
            <td class='text-center'>
                <select data-MSHH="<?php echo $getItems->MSHH[$key]; ?>" class="form-control select-size-edit-item w-100" data-MSHH="<?php echo $getItems->MSHH[$key]; ?>">
                    <?php
                    foreach ($getFullSize->MSHH as $key1 => $value1) {
                        if ($value1 == $value) {
                    ?>
                            <option class="w-100" value="<?php echo "" . $getFullSize->size[$key1]; ?>"><?php echo $getFullSize->size[$key1]; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </td>
            <td class='d-flex flex-row justify-content-center'>
                <?php
                foreach ($getFullSize->MSHH as $key2 => $value2) {
                    if ($value2 == $value && $getFullSize->size[$key2] == 36) {
                ?>
                        <input type="number" class="w-75 size-edit" value="<?php echo $getFullSize->soLUong[$key2]; ?>">
                <?php
                    }
                }
                ?>
            </td>
            <td class='text-center'>
                <button class="btn-outline-success p-1 h-100 w-75 text-center btn-update-item">O</button>
            </td>
            <td class='text-center'>
                <button class="btn-outline-danger p-1 h-100 w-75 text-center btn-delete-item">X</button>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>