<tbody class='tbody-edit-customer'>
    <?php foreach ($getUserName->idKH as $key => $value) { ?>
        <tr>
            <td class="text-center"><?php echo $value; ?></td>
            <td class="text-center"><?php echo $getUserName->tendangnhap[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->tenkhachhang[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->sodienthoai[$key]; ?></td>
            <td class="text-center"><?php echo $getUserName->diachi[$key] . ', ' . $getUserName->xaphuong[$key] . ', ' . $getUserName->quanhuyen[$key] . ', ' . $getUserName->tinhthanh[$key]; ?></td>
        </tr>
    <?php } ?>
</tbody>