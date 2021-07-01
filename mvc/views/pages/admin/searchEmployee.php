<tbody class='tbody-edit-employee'>
    <?php foreach ($getUserName->idNV as $key => $value) { ?>
        <tr>
            <td class="text-center"><?php echo $value; ?></td>
            <td class="text-center"><?php echo $getUserName->tendangnhap[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->tennhanvien[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->sodienthoai[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->diachi[$key] . ', ' . $getUserName->xaphuong[$key] . ', ' . $getUserName->quanhuyen[$key] . ', ' . $getUserName->tinhthanh[$key]; ?></td>
            <td class="text-center">
                <select class="select-state-edit-employee" data-MSNV="<?php echo $getUserName->tendangnhap[$key]; ?>">
                    <option value="Đang hoạt động" <?php if ($getUserName->idGroup[$key] == 1) echo "selected='selected'" ?> class="">Đang hoạt động</option>
                    <option value="Dừng hoạt động" <?php if ($getUserName->idGroup[$key] == 3) echo "selected='selected'" ?> class=''>Dừng hoạt động</option>
                </select>
            </td>
        </tr>
    <?php } ?>
</tbody>