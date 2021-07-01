<?php
class ItemsModel extends connDB
{

    public function getLargeGroup()
    {
        $sql = "select thuonghieu.THUONGHIEU_MA maNhom, thuonghieu.THUONGHIEU_TEN tenNhom from thuonghieu
        ";
        $array = array();
        $result = $this->conn->query($sql);
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['maNhom'][] = $arr['maNhom'];
        }
        return json_encode($array);
    }

    public function insertTrademark($tennhomgiay, $tenthuonghieu)
    {
        $tennhomgiay = mysqli_real_escape_string($this->conn, $tennhomgiay);
        $tenthuonghieu = mysqli_real_escape_string($this->conn, $tenthuonghieu);
        $sqlGetIdTrademark = "SELECT thuonghieu.THUONGHIEU_MA maNhom 
                from thuonghieu 
                WHERE thuonghieu.THUONGHIEU_TEN = '$tenthuonghieu'";
        $idTrademarkArr = mysqli_fetch_array($this->conn->query($sqlGetIdTrademark));
        $idTrademark = $idTrademarkArr[0];
        $sql = "INSERT into groupitems(maThuongHieu, tenNhom) VALUES ($idTrademark, '$tennhomgiay')
        ";
        $resultInsert = $this->conn->query($sql);
        if ($resultInsert) {
            $array = array(
                "result" => "True"
            );
        } else {
            $array = array(
                "result" => "False"
            );
        }
        return json_encode($array);
    }

    public function checkGroupItems($tennhomgiay)
    {
        $tennhomgiay = mysqli_real_escape_string($this->conn, $tennhomgiay);
        $test = "select nhomsanpham.NHOM_MA maNhom from nhomsanpham where nhomsanpham.NHOM_TEN = '$tennhomgiay'      
        ";
        $number = mysqli_num_rows($this->conn->query($test));
        $result = "";
        if ($number > 0) {
            $result = "Nhóm giày đã tồn tại";
        }
        return $result;
    }

    public function getGroup()
    {
        $sql = "select a.NHOM_MA maNhom, a.NHOM_TEN tenNhom, a.THUONGHIEU_MA maThuongHieu, b.THUONGHIEU_TEN as tenThuongHieu
                from nhomsanpham a, thuonghieu b 
                WHERE a.THUONGHIEU_MA = b.THUONGHIEU_MA 
                ORDER by a.THUONGHIEU_MA ASC 
        ";
        $array = array();
        $result = $this->conn->query($sql);
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['maNhom'][] = $arr['maNhom'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['maThuongHieu'][] = $arr['maThuongHieu'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function getTrademark()
    {
        $sql = "SELECT thuonghieu.THUONGHIEU_MA maNhom, thuonghieu.THUONGHIEU_TEN tenNhom 
                FROM thuonghieu 
                ORDER BY thuonghieu.THUONGHIEU_MA ASC
        ";
        $arr = array();
        $result = $this->conn->query($sql);
        while ($array = mysqli_fetch_assoc($result)) {
            $arr['maNhom'][] = $array['maNhom'];
            $arr['tenNhom'][] = $array['tenNhom'];
        }
        return json_encode($arr);
    }

    public function getItemsWithGroup()
    {
        $sql = "SELECT a.SP_MA MSHH, a.SP_TEN TenHH, a.SP_GIA Gia, a.NHOM_MA MaNhom, a.SP_MOTA MoTaHH, 
            b.NHOM_TEN tenNhom, b.THUONGHIEU_MA maThuongHieu, c.THUONGHIEU_TEN as tenThuongHieu, d.HA_DUONGDAN srcHinh
                FROM sanpham a, nhomsanpham b, thuonghieu c, hinhanh d 
                WHERE a.NHOM_MA = b.NHOM_MA AND b.THUONGHIEU_MA = c.THUONGHIEU_MA and d.SP_MA = a.SP_MA
                GROUP BY MSHH
        ";
        $array = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['Gia'][] = $arr['Gia'];
            $array['MoTaHH'][] = $arr['MoTaHH'];
            $array['MaNhom'][] = $arr['MaNhom'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['maThuongHieu'][] = $arr['maThuongHieu'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function getImageItems()
    {
        $sql = "SELECT hinhanh.SP_MA maHinh, hinhanh.HA_DUONGDAN srcHinh
                FROM hinhanh
        ";
        $array = array();
        $result = $this->conn->query($sql);
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['maHinh'][] = $arr['maHinh'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function getIdFromName($nameItem)
    {
        $nameItem = mysqli_real_escape_string($this->conn, $nameItem);
        $sql = "SELECT sanpham.SP_MA MSHH 
            FROM sanpham WHERE sanpham.SP_TEN = '$nameItem'
        ";
        $idItemArr = mysqli_fetch_array($this->conn->query($sql));
        return $idItemArr[0];
    }

    public function getIdFromNameGroup($nameGroup)
    {
        $nameGroup = mysqli_real_escape_string($this->conn, $nameGroup);
        $sql = "SELECT nhomsanpham.NHOM_MA maNhom from nhomsanpham WHERE nhomsanpham.NHOM_TEN = '$nameGroup'
        ";
        $idGroupArr = mysqli_fetch_array($this->conn->query($sql));
        if ($idGroupArr)
            return $idGroupArr[0];
        else
            return 'false';
    }

    public function addItem($nameItem, $price, $nameGroup, $mota, $sizeArr, $soluongArr, $nameImageArr)
    {
        $nameItem = mysqli_real_escape_string($this->conn, $nameItem);
        $nameGroup = mysqli_real_escape_string($this->conn, $nameGroup);
        $this->conn->autocommit(false);
        $this->conn->begin_transaction();
        $idGroup = $this->getIdFromNameGroup($nameGroup);
        $mota = mysqli_real_escape_string($this->conn, $mota);
        $nameItem = mysqli_real_escape_string($this->conn, $nameItem);

        $sqlAddItem = "INSERT into sanpham(sanpham.SP_TEN, sanpham.SP_GIA, sanpham.NHOM_MA, sanpham.SP_MOTA) 
                        VALUES ('$nameItem', $price, $idGroup, '$mota')
        ";
        $result = array(
            "result" => "false"
        );
        $targetDocument = "../../../../SusuSneaker/public/image/imageItems/";
        $resultInsertItem = $this->conn->query($sqlAddItem);
        if ($resultInsertItem) {
            $idItem = $this->getIdFromName($nameItem);
            // echo $idItem;
            for ($i = 0; $i < count($nameImageArr); $i++) {
                $urlImage = $targetDocument . basename($nameImageArr[$i]);
                $urlImage = mysqli_real_escape_string($this->conn, $urlImage);
                $sqlAddImage = "INSERT into hinhanh(hinhanh.SP_MA, hinhanh.HA_DUONGDAN) 
                                VALUES ($idItem, '$urlImage')
                ";
                $resultInsertAddImage = $this->conn->query($sqlAddImage);
                // echo $urlImage;
                if ($resultInsertAddImage) {
                    // echo "Them url hinh thanh cong";
                } else {
                    echo "Loi khi them url hinh";
                    $this->conn->rollback();
                    return;
                }
            }
            for ($i = 0; $i < count($sizeArr); $i++) {
                $sqlAddSize = "insert into size(size.SP_MA, size.SIZE_KICHCO, size.SIZE_SOLUONG) 
                                values ($idItem, $sizeArr[$i], $soluongArr[$i])
                ";
                $resultInsertAddSize = $this->conn->query($sqlAddSize);
                if ($resultInsertAddSize) {
                    // echo "Theem size thanh cong";
                } else {
                    echo "Loi khi them size";
                    $this->conn->rollback();
                    return;
                }
            }
            $this->conn->commit();
            $result = array(
                "result" => "true"
            );
        } else {
            // echo "khong vao duco";
            $result = array(
                "result" => "false"
            );
            $this->conn->rollback();
        }
        return json_encode($result);
    }

    public function search($keyword)
    {
        $keyword = mysqli_real_escape_string($this->conn, $keyword);
        $sql   = "SELECT a.SP_MA MSHH, a.SP_TEN TenHH, b.NHOM_TEN tenNhom, c.HA_DUONGDAN srcHinh,
                         a.SP_GIA Gia, d.THUONGHIEU_TEN AS tenThuongHieu
            FROM sanpham a, nhomsanpham b, hinhanh c, thuonghieu d
            WHERE a.NHOM_MA = b.NHOM_MA and a.SP_MA = c.SP_MA and b.THUONGHIEU_MA = d.THUONGHIEU_MA
                and (a.SP_TEN REGEXP '$keyword' or a.SP_TEN LIKE '$keyword' 
                or b.NHOM_TEN REGEXP '$keyword' or b.NHOM_TEN LIKE '$keyword'
                or d.THUONGHIEU_TEN REGEXP '$keyword' or d.THUONGHIEU_TEN LIKE '$keyword')
                group by (MSHH)
        ";
        $listItems = $this->conn->query($sql);
        if ($listItems == false) {
            return json_encode(false);
        }
        $arr = array();
        $arr['keyword'][] = $keyword;
        while ($result = mysqli_fetch_array($listItems)) {
            $arr['MSHH'][] = $result['MSHH'];
            $arr['TenHH'][] = $result['TenHH'];
            $arr['tenNhom'][] = $result['tenNhom'];
            $arr['srcHinh'][] = $result['srcHinh'];
            $arr['Gia'][] = $result['Gia'];
            $arr['tenThuongHieu'][] = $result['tenThuongHieu'];
        }
        return json_encode($arr);
    }

    public function groupSearch($keyword)
    {
        $keyword = mysqli_real_escape_string($this->conn, $keyword);
        $sql   = " SELECT DISTINCT d.THUONGHIEU_TEN AS tenThuongHieu
                FROM sanpham a, nhomsanpham b, hinhanh c, thuonghieu d
                WHERE a.NHOM_MA = b.NHOM_MA and a.SP_MA = c.SP_MA and b.THUONGHIEU_MA = d.THUONGHIEU_MA
                    and (a.SP_TEN REGEXP '$keyword' or a.SP_TEN LIKE '$keyword' 
                        or b.NHOM_TEN REGEXP '$keyword' or b.NHOM_TEN LIKE '$keyword'
                        or d.THUONGHIEU_TEN REGEXP '$keyword' or d.THUONGHIEU_TEN LIKE '$keyword')
        ";
        $listItems = $this->conn->query($sql);
        $arr = array();
        while ($result = mysqli_fetch_assoc($listItems)) {
            $arr['tenThuongHieu'][] = $result['tenThuongHieu'];
        }
        return json_encode($arr);
    }

    public function getIdTrademark($nameTradeMark)
    {
        $nameTradeMark = mysqli_real_escape_string($this->conn, $nameTradeMark);
        $sql = "SELECT thuonghieu.THUONGHIEU_MA AS idTrademark 
                FROM thuonghieu WHERE thuonghieu.THUONGHIEU_TEN = '$nameTradeMark'
        ";
        $id = mysqli_fetch_array($this->conn->query($sql));
        if ($id)
            return $id[0];
        else return false;
    }

    public function getGroupFromNameTrademark($nameTradeMark)
    {
        $nameTradeMark = mysqli_real_escape_string($this->conn, $nameTradeMark);
        $idTrademark = $this->getIdTrademark($nameTradeMark);
        if ($idTrademark === false) {
            return false;
        }
        $sql = "SELECT a.NHOM_MA maNhom, a.NHOM_TEN tenNhom, a.THUONGHIEU_MA maThuongHieu 
                FROM nhomsanpham a WHERE a.THUONGHIEU_MA = $idTrademark
        ";
        $arr = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($array = mysqli_fetch_assoc($result)) {
            $arr['maNhom'][] = $array['maNhom'];
            $arr['tenNhom'][] = $array['tenNhom'];
            $arr['maThuongHieu'][] = $array['maThuongHieu'];
        }
        return json_encode($arr);
    }

    public function getItemsFromTrademark($nameTradeMark)
    {
        $nameTradeMark = mysqli_real_escape_string($this->conn, $nameTradeMark);
        $idTrademark = $this->getIdTrademark($nameTradeMark);
        $sql = "SELECT a.SP_MA MSHH, a.SP_TEN TenHH, b.NHOM_TEN tenNhom, c.HA_DUONGDAN srcHinh, a.SP_GIA Gia, d.THUONGHIEU_TEN AS tenThuongHieu
                FROM sanpham a, nhomsanpham b, hinhanh c, thuonghieu d
                WHERE a.NHOM_MA = b.NHOM_MA and a.SP_MA = c.SP_MA and b.THUONGHIEU_MA = d.THUONGHIEU_MA	
                    and d.THUONGHIEU_MA = $idTrademark
                    Group by MSHH
        ";
        $array = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['srcHinh'][] = $arr['srcHinh'];
            $array['Gia'][] = $arr['Gia'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function getItemsFromGroup($nameGroup)
    {
        $nameGroup = mysqli_real_escape_string($this->conn, $nameGroup);
        $idGroup = $this->getIdFromNameGroup($nameGroup);
        if ($idGroup === 'false') {
            return json_encode('false');
        }
        $sql = "SELECT a.SP_MA MSHH, a.SP_TEN TenHH, b.NHOM_TEN tenNhom, c.HA_DUONGDAN srcHinh, a.SP_GIA Gia, d.THUONGHIEU_TEN AS tenThuongHieu
                FROM sanpham a, nhomsanpham b, hinhanh c, thuonghieu d
                WHERE a.NHOM_MA = b.NHOM_MA and a.SP_MA = c.SP_MA and b.THUONGHIEU_MA = d.THUONGHIEU_MA
                    and b.NHOM_MA = $idGroup
                Group by MSHH
        ";
        $array = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['srcHinh'][] = $arr['srcHinh'];
            $array['Gia'][] = $arr['Gia'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function getInfoItem($mshh)
    {
        $sql = "SELECT a.SP_MA MSHH, a.SP_TEN TenHH, a.SP_GIA Gia, a.SP_MOTA MoTaHH, b.NHOM_TEN tenNhom, c.THUONGHIEU_TEN as tenThuongHieu 
                FROM sanpham a, nhomsanpham b, thuonghieu c 
                WHERE c.THUONGHIEU_MA = b.THUONGHIEU_MA and b.NHOM_MA = a.NHOM_MA and a.SP_MA = $mshh
        ";
        $result = $this->conn->query($sql);
        $array = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['Gia'][] = $arr['Gia'];
            $array['MoTaHH'][] = $arr['MoTaHH'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function getImgItem($mshh)
    {
        $sql = "SELECT hinhanh.SP_MA maHinh, hinhanh.HA_DUONGDAN srcHinh 
                FROM hinhanh WHERE hinhanh.SP_MA = $mshh
        ";
        $result = $this->conn->query($sql);
        $array = array();
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['maHinh'][] = $arr['maHinh'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function getSizeItem($mshh)
    {
        $sql = "SELECT size.SP_MA MSHH, size.SIZE_KICHCO size, size.SIZE_SOLUONG soLuong 
                FROM size WHERE size.SP_MA = 2
        ";
        $result = $this->conn->query($sql);
        $array = array();
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_assoc($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['soLuong'][] = $arr['soLuong'];
        }
        return json_encode($array);
    }

    public function checkSize($mshh)
    {
        $sql = "SELECT a.SIZE_KICHCO size
                FROM size a WHERE a.SP_MA = $mshh and a.SIZE_SOLUONG > 0 ";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        $count = $result->num_rows;
        if ($count == 0) {
            $array[0] = 0;
            return json_encode($array);;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array[] = $arr['size'];
        }
        return json_encode($array);
    }

    public function addCart($mskh, $mshh, $sl, $size)
    {
        $sqlInsert = "INSERT INTO giohang(giohang.SP_MA, giohang.KH_MA, giohang.SIZE_KICHCO, giohang.GIOHANG_SOLUONG) 
                    VALUES($mshh, $mskh, $size, $sl)
        ";
        $sqlUpdate = "UPDATE giohang a SET a.GIOHANG_SOLUONG = a.GIOHANG_SOLUONG + 1 
                        WHERE a.KH_MA = $mskh and a.SP_MA = $mshh and a.SIZE_KICHCO = $size ";
        $sqlcheck = "select a.SP_MA MSHH from giohang a where a.SP_MA = $mshh and a.KH_MA = $mskh and a.SIZE_KICHCO = $size";
        $count = mysqli_num_rows($this->conn->query($sqlcheck));
        if ($count > 0) {
            $result = $this->conn->query($sqlUpdate);
            if ($result === false)
                return false;
        } else {
            $result = $this->conn->query($sqlInsert);
            if ($result === false)
                return false;
        }
        return true;
    }

    public function getItemCart($idKH)
    {
        $sql = "SELECT a.SP_MA MSHH, d.THUONGHIEU_TEN tenNhom , b.SP_TEN TenHH, a.SIZE_KICHCO size, 
                a.GIOHANG_SOLUONG soLuong, b.SP_GIA Gia, e.HA_DUONGDAN srcHinh
                FROM giohang a, sanpham b, nhomsanpham c, thuonghieu d, hinhanh e
                WHERE a.KH_MA = $idKH and b.SP_MA = a.SP_MA and b.NHOM_MA = c.NHOM_MA and c.THUONGHIEU_MA = d.THUONGHIEU_MA AND e.SP_MA = a.SP_MA
                group BY b.SP_TEN, a.SIZE_KICHCO
                order by TenHH ASC
            ";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        $array = array();
        while ($arr = mysqli_fetch_array($result)) {
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['size'][] = $arr['size'];
            $array['soLuong'][] = $arr['soLuong'];
            $array['Gia'][] = $arr['Gia'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function getGroupCart($idKH)
    {
        $sql = "SELECT DISTINCT d.THUONGHIEU_TEN tenNhom
                FROM giohang a, sanpham b, nhomsanpham c, thuonghieu d, hinhanh e
                WHERE a.KH_MA = $idKH and b.SP_MA = a.SP_MA and b.NHOM_MA = c.NHOM_MA 
                    and c.THUONGHIEU_MA = d.THUONGHIEU_MA AND e.SP_MA = a.SP_MA
                group BY b.SP_TEN, a.SIZE_KICHCO
                order by b.SP_TEN ASC";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        $array = array();
        while ($arr = mysqli_fetch_array($result)) {
            $array['tenNhom'][] = $arr['tenNhom'];
        }
        return json_encode($array);
    }

    public function countItemCart($idUser)
    {
        $sql = "SELECT giohang.SP_MA MSHH FROM giohang WHERE giohang.KH_MA = $idUser";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        $countRow = mysqli_num_rows($result);
        return json_encode($countRow);
    }

    public function getRemainAmountItemCart($idUser)
    {
        $sql = "SELECT a.SP_MA MSHH, a.SIZE_KICHCO size, b.SIZE_SOLUONG soLuong     
                FROM giohang a, size b 
                WHERE a.KH_MA = $idUser AND a.SP_MA = b.SP_MA AND a.SIZE_KICHCO = b.SIZE_KICHCO";
        $result = $this->conn->query($sql);
        $array = [];
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['soLuong'][] = $arr['soLuong'];
        }
        return json_encode($array);
    }

    public function updateCart($id, $mshh, $soluong, $size)
    {
        $sql = "UPDATE giohang 
                SET giohang.GIOHANG_SOLUONG = $soluong
                WHERE giohang.KH_MA = $id AND giohang.SP_MA = $mshh AND giohang.SIZE_KICHCO = $size";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        return true;
    }

    public function deleteItemCart($id, $mshh, $soluong, $size)
    {
        $sql = "DELETE FROM giohang 
                WHERE giohang.KH_MA = $id AND giohang.SP_MA = $mshh AND giohang.SIZE_KICHCO = $size";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        return true;
    }

    public function getItemPay($mshh)
    {
        $sql = "SELECT items.SP_MA MSHH, items.SP_TEN TenHH, items.SP_GIA Gia, image.HA_DUONGDAN srcHinh
                FROM sanpham items, hinhanh image
                WHERE items.SP_MA = $mshh AND image.SP_MA = items.SP_MA
                LIMIT 1";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['Gia'][] = $arr['Gia'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function addOrder($idUser, $address, $fullName, $phone, $nameWard, $obj_cart)
    {
        $address = mysqli_real_escape_string($this->conn, $address);
        $fullName = mysqli_real_escape_string($this->conn, $fullName);
        $nameWard = mysqli_real_escape_string($this->conn, $nameWard);
        try {
            $error = 0;
            $sql_getIdWard = "SELECT XAPHUONG_MA id FROM xaphuong WHERE xaphuong.XAPHUONG_TEN = '$nameWard' ";
            $result_getIdWard = $this->conn->query($sql_getIdWard);
            if ($result_getIdWard === false) {
                echo "Not find ward";
                return $result_getIdWard;
            } else {
                $row = mysqli_fetch_array($result_getIdWard);
                $idWard = $row['id'];
            }
            $dateOrder = date('y-m-d h:i:s');
            $stateOrder = 0;
            $sql_addOrder = "INSERT INTO donhang(donhang.KH_MA, donhang.DH_NGAYDATHANG, donhang.TT_MA, donhang.DH_DIACHI,
                                            donhang.DH_TENNGUOINHAN, donhang.DH_SODIENTHOAINHAN, donhang.XAPHUONG_MA)
                            VALUES($idUser, '$dateOrder', $stateOrder, '$address', 
                                '$fullName', '$phone', '$idWard')";
            $this->conn->autocommit(false);
            $this->conn->begin_transaction();
            $result_addOrder = $this->conn->query($sql_addOrder);
            if ($result_addOrder === false) {
                $error++;
                echo "Error when add order!";
            } else if ($result_addOrder) {
                $sql_getMSDH = "SELECT donhang.DH_MA MSDH FROM donhang 
                                WHERE donhang.KH_MA = $idUser and donhang.DH_NGAYDATHANG = '$dateOrder'";
                if (mysqli_num_rows($this->conn->query($sql_getMSDH)) == 0) {
                    $error++;
                    echo "Error when get id order!";
                } else {
                    $result_getMSDH = $this->conn->query($sql_getMSDH);
                    $row2 = mysqli_fetch_array($result_getMSDH);
                    $MSDH = $row2['MSDH'];
                }
            }
            for ($i = 0; $i < count($obj_cart['item']); $i++) {
                $mshh = $obj_cart['item'][$i]['mshh'];
                $size = $obj_cart['item'][$i]['size'];
                $soluong = $obj_cart['item'][$i]['amount'];
                $price = $obj_cart['item'][$i]['price'];
                $sql_addOrderDetail = "INSERT INTO chitietdonhang(chitietdonhang.DH_MA, chitietdonhang.SP_MA, chitietdonhang.SIZE_KICHCO, chitietdonhang.CTDH_SOLUONG, chitietdonhang.CTDH_GIA) 
                                        VALUES ($MSDH, $mshh, $size, $soluong, $price)";
                $result_addOrderDetail = $this->conn->query($sql_addOrderDetail);
                if ($result_addOrderDetail === false) {
                    $error++;
                    echo "Error when add order detail!";
                } else {
                    $sql_removeCart = "DELETE FROM giohang 
                            WHERE giohang.KH_MA = $idUser AND giohang.SP_MA = $mshh AND giohang.SIZE_KICHCO = $size";
                    $result_removeCart = $this->conn->query($sql_removeCart);
                    if ($result_removeCart === false) {
                        $error++;
                    }
                }
            }
            if ($error == 0) {
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollback();
                return false;
            }
        } catch (Exception $e) {
            $this->conn->rollback();
            echo "FAILD" . $e;
        }
    }

    public function getMSDH($idUser)
    {
        $sql = "SELECT donhang.DH_MA MSDH, trangthai.TT_TEN TrangThai, donhang.DH_NGAYDATHANG NgayDH 
                FROM donhang, trangthai
                WHERE donhang.KH_MA = $idUser AND donhang.TT_MA = trangthai.TT_MA
                ORDER BY donhang.DH_MA DESC";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSDH'][] = $arr['MSDH'];
            $array['TrangThai'][] = $arr['TrangThai'];
            $array['NgayDH'][] = $arr['NgayDH'];
        }
        return json_encode($array);
    }

    public function getAllOrder($idUser)
    {
        $sql = "SELECT donhang.DH_MA MSDH, donhang.KH_MA MSKH, trangthai.TT_TEN TrangThai, donhang.DH_DIACHI diachi, donhang.DH_TENNGUOINHAN hoten, donhang.DH_SODIENTHOAINHAN sdt, donhang.XAPHUONG_MA idWard, chitietdonhang.SP_MA MSHH, chitietdonhang.SIZE_KICHCO size, chitietdonhang.CTDH_SOLUONG soLuong, sanpham.SP_GIA gia, hinhanh.HA_DUONGDAN srcHinh, sanpham.SP_TEN TenHH
                FROM donhang, chitietdonhang, hinhanh, sanpham, trangthai
                WHERE donhang.KH_MA = $idUser AND chitietdonhang.DH_MA = donhang.DH_MA 
                        AND hinhanh.SP_MA = chitietdonhang.SP_MA AND sanpham.SP_MA = chitietdonhang.SP_MA
                GROUP BY chitietdonhang.SP_MA, donhang.DH_NGAYDATHANG
                ORDER BY donhang.DH_NGAYDATHANG DESC;";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSDH'][] = $arr['MSDH'];
            $array['MSKH'][] = $arr['MSKH'];
            $array['TrangThai'][] = $arr['TrangThai'];
            $array['diachi'][] = $arr['diachi'];
            $array['hoten'][] = $arr['hoten'];
            $array['sdt'][] = $arr['sdt'];
            $array['idWard'][] = $arr['idWard'];
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['soLuong'][] = $arr['soLuong'];
            $array['gia'][] = $arr['gia'];
            $array['srcHinh'][] = $arr['srcHinh'];
            $array['TenHH'][] = $arr['TenHH'];
        }
        return json_encode($array);
    }

    public function addSold($msdh)
    {
        $sql = "SELECT chitietdonhang.SP_MA MSHH, chitietdonhang.SIZE_KICHCO size, chitietdonhang.CTDH_SOLUONG soLuong, chitietdonhang.CTDH_GIA gia
                FROM chitietdonhang WHERE chitietdonhang.DH_MA = $msdh";
        $result = $this->conn->query($sql);
        $array = [];
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['soLuong'][] = $arr['soLuong'];
            $array['gia'][] = $arr['gia'];
        }

        $month = (int)date("m");
        $year = (int)date("y");

        for ($i = 0; $i < count($array['MSHH']); $i++) {
            $sumPrice = $array['soLuong'][$i] * $array['gia'][$i];
            $mshh = $array['MSHH'][$i];
            $size = $array['size'][$i];
            $soluong = $array['soLuong'][$i];
            $sqlcheckSold = "SELECT * FROM sanphamdaban 
                            WHERE sanphamdaban.SP_MA = $mshh AND 
                                sanphamdaban.SIZE_KICHCO = $size AND
                                sanphamdaban.SPDB_THANG = $month AND
                                sanphamdaban.SPDB_NAM = $year";
            $count = $this->conn->query($sqlcheckSold);
            $countRow = mysqli_num_rows($count);
            if ($countRow == 0) {
                $sqlAddSold = "INSERT INTO sanphamdaban(sanphamdaban.SP_MA, sanphamdaban.SIZE_KICHCO, sanphamdaban.SPDB_SOLUONG, sanphamdaban.SPDB_THANG, sanphamdaban.SPDB_NAM) 
                VALUES ($mshh, $size, $soluong, $month, $year)";
                $resultAdd = $this->conn->query($sqlAddSold);
                if ($resultAdd === false) {
                    return false;
                }
            }else{
                $sqlUpdateSold = "UPDATE sanphamdaban 
                SET sanphamdaban.SPDB_SOLUONG = sanphamdaban.SPDB_SOLUONG + $soluong
                WHERE sanphamdaban.SP_MA = $mshh AND 
                    sanphamdaban.SIZE_KICHCO = $size AND
                                                    sanphamdaban.SPDB_THANG = $month AND
                                                    sanphamdaban.SPDB_NAM = $year";           
                $resultUpdateSold = $this->conn->query($sqlUpdateSold);
                if($resultUpdateSold === false){
                    return false;
                }                 
            }
        }
        return true;
    }

    public function updateStateOrder($msdh, $stateUpdate)
    {
        $this->conn->autocommit(false);
        $this->conn->begin_transaction();
        $flag = true;
        $sql = "UPDATE donhang
            SET donhang.TT_MA = $stateUpdate
            WHERE donhang.DH_MA = $msdh";
        if ($stateUpdate == 2) {
            if ($this->addSold($msdh)) {
                $flag = true;
            } else {
                $flag = false;
            }
        }
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            $flag = false;
        }
        if ($flag) {
            $this->conn->commit();
            return true;
        }
        $this->conn->rollback();
        return false;
    }

    public function getItemsEdit()
    {
        $sql = "SELECT  sanpham.SP_MA MSHH, sanpham.SP_TEN TenHH, sanpham.SP_GIA Gia, nhomsanpham.NHOM_TEN tenNhom, thuonghieu.THUONGHIEU_TEN tenThuongHieu
                FROM sanpham, nhomsanpham, thuonghieu
                WHERE sanpham.NHOM_MA = nhomsanpham.NHOM_MA AND nhomsanpham.THUONGHIEU_MA = thuonghieu.THUONGHIEU_MA
                ORDER BY sanpham.SP_MA ASC";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['Gia'][] = $arr['Gia'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function getFullSize()
    {
        $sql = "SELECT  size.SP_MA MSHH, size.SIZE_KICHCO size, size.SIZE_SOLUONG soLuong
                FROM size
                ORDER BY size.SP_MA ASC";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['soLUong'][] = $arr['soLuong'];
        }
        return json_encode($array);
    }

    public function getAmount($mshh, $size)
    {
        $sql = "SELECT SIZE.SIZE_SOLUONG 
        FROM size 
        WHERE SIZE_KICHCO = $size AND size.SP_MA = $mshh";
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        $result = mysqli_fetch_array($result);
        echo $result[0];
    }

    public function updateItem($mshh, $size, $soLuong, $gia)
    {
        $sql = "UPDATE size
                SET SIZE_SOLUONG = $soLuong
                WHERE SIZE_KICHCO = $size AND size.SP_MA = $mshh";
        $sqlUpdatePrice = "UPDATE sanpham
                            SET sanpham.SP_GIA = $gia
                            WHERE sanpham.SP_MA = $mshh";
        $result = $this->conn->query($sql);
        $result1 = $this->conn->query($sqlUpdatePrice);
        if ($result === true && $result1 === true) {
            return true;
        }
        return false;
    }

    public function deleteItem($mshh)
    {
        $sql = "UPDATE size
        SET size.SIZE_SOLUONG = 0
        WHERE size.SP_MA = $mshh";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function searchItemEdit($value)
    {
        $value = mysqli_real_escape_string($this->conn, $value);
        $sql = "SELECT  sanpham.SP_MA MSHH, sanpham.SP_TEN TenHH, sanpham.SP_GIA Gia,
                         nhomsanpham.NHOM_TEN tenNhom, thuonghieu.THUONGHIEU_TEN tenThuongHieu
                FROM sanpham, nhomsanpham, thuonghieu
                WHERE sanpham.NHOM_MA = nhomsanpham.NHOM_MA 
                        AND nhomsanpham.THUONGHIEU_MA = thuonghieu.THUONGHIEU_MA 
                        AND sanpham.SP_TEN REGEXP '$value'
                ORDER BY sanpham.SP_MA ASC";
        $array = [];
        $result = $this->conn->query($sql);
        $count = mysqli_num_rows($this->conn->query($sql));
        if ($result === false || $count == 0) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSHH'][] = $arr['MSHH'];
            $array['TenHH'][] = $arr['TenHH'];
            $array['Gia'][] = $arr['Gia'];
            $array['tenNhom'][] = $arr['tenNhom'];
            $array['tenThuongHieu'][] = $arr['tenThuongHieu'];
        }
        return json_encode($array);
    }

    public function searchOrderEdit($value)
    {
        $value = mysqli_real_escape_string($this->conn, $value);
        if ($value != '') {
            $sql = "SELECT donhang.DH_MA MSDH, donhang.KH_MA MSKH, donhang.TT_MA trangthai, 
                        donhang.DH_NGAYDATHANG ngaydathang, donhang.DH_DIACHI diachi, 
                        donhang.DH_TENNGUOINHAN tennguoinhan, donhang.DH_SODIENTHOAINHAN sodienthoai, 
                        taikhoan.TK_TENDANGNHAP tendangnhap, xaphuong.XAPHUONG_TEN xaphuong, 
                        quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh,
                        SUM(chitietdonhang.CTDH_GIA) tongtien, COUNT(chitietdonhang.CTDH_GIA) sosanpham
                FROM donhang, xaphuong, quanhuyen, tinhthanh, taikhoan, khachhang, chitietdonhang
                WHERE donhang.DH_MA = $value AND donhang.KH_MA = khachhang.KH_MA AND khachhang.TK_MA = taikhoan.TK_MA 
                        AND donhang.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA
                        AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA AND donhang.DH_MA = chitietdonhang.DH_MA
                GROUP BY (MSDH)
                ORDER BY ngaydathang DESC";
        } else {
            $sql = "SELECT donhang.DH_MA MSDH, donhang.KH_MA MSKH, donhang.TT_MA trangthai, 
                        donhang.DH_NGAYDATHANG ngaydathang, donhang.DH_DIACHI diachi, 
                        donhang.DH_TENNGUOINHAN tennguoinhan, donhang.DH_SODIENTHOAINHAN sodienthoai, 
                        taikhoan.TK_TENDANGNHAP tendangnhap, xaphuong.XAPHUONG_TEN xaphuong, 
                        quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh,
                        SUM(chitietdonhang.CTDH_GIA) tongtien, COUNT(chitietdonhang.CTDH_GIA) sosanpham
                FROM donhang, xaphuong, quanhuyen, tinhthanh, taikhoan, khachhang, chitietdonhang
                WHERE donhang.KH_MA = khachhang.KH_MA AND khachhang.TK_MA = taikhoan.TK_MA 
                        AND donhang.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA
                        AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA AND donhang.DH_MA = chitietdonhang.DH_MA
                GROUP BY (MSDH)
                ORDER BY ngaydathang DESC";
        }

        $array = [];
        $result = $this->conn->query($sql);
        $count = mysqli_num_rows($this->conn->query($sql));
        if ($result === false || $count == 0) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSDH'][] = $arr['MSDH'];
            $array['MSKH'][] = $arr['MSKH'];
            $array['trangthai'][] = $arr['trangthai'];
            $array['ngaydathang'][] = $arr['ngaydathang'];
            $array['diachi'][] = $arr['diachi'];
            $array['tennguoinhan'][] = $arr['tennguoinhan'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
            $array['tongtien'][] = $arr['tongtien'];
            $array['sosanpham'][] = $arr['sosanpham'];
        }
        return json_encode($array);
    }

    public function getAllOrderAdmin()
    {
        $sql = "SELECT donhang.DH_MA MSDH, donhang.KH_MA MSKH, donhang.TT_MA trangthai, 
                        donhang.DH_NGAYDATHANG ngaydathang, donhang.DH_DIACHI diachi, 
                        donhang.DH_TENNGUOINHAN tennguoinhan, donhang.DH_SODIENTHOAINHAN sodienthoai, 
                        taikhoan.TK_TENDANGNHAP tendangnhap, xaphuong.XAPHUONG_TEN xaphuong, 
                        quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh,
                        SUM(chitietdonhang.CTDH_GIA) tongtien, COUNT(chitietdonhang.CTDH_GIA) sosanpham
                FROM donhang, xaphuong, quanhuyen, tinhthanh, taikhoan, khachhang, chitietdonhang
                WHERE donhang.KH_MA = khachhang.KH_MA AND khachhang.TK_MA = taikhoan.TK_MA 
                        AND donhang.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA
                        AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA AND donhang.DH_MA = chitietdonhang.DH_MA
                GROUP BY (MSDH)
                ORDER BY ngaydathang DESC";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSDH'][] = $arr['MSDH'];
            $array['MSKH'][] = $arr['MSKH'];
            $array['trangthai'][] = $arr['trangthai'];
            $array['ngaydathang'][] = $arr['ngaydathang'];
            $array['diachi'][] = $arr['diachi'];
            $array['tennguoinhan'][] = $arr['tennguoinhan'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
            $array['tongtien'][] = $arr['tongtien'];
            $array['sosanpham'][] = $arr['sosanpham'];
        }
        return json_encode($array);
    }

    public function confirmOrder($msdh)
    {
        $sql = "UPDATE donhang 
                SET donhang.TT_MA = 1
                WHERE donhang.DH_MA = $msdh";
        $result = $this->conn->query($sql);
        return json_encode($result);
    }

    public function cancelOrder($msdh)
    {
        $sql = "UPDATE donhang 
                SET donhang.TT_MA = 3
                WHERE donhang.DH_MA = $msdh";
        $result = $this->conn->query($sql);
        return json_encode($result);
    }

    public function seenOrder($msdh)
    {
        $sql = "UPDATE donhang 
                SET donhang.TT_MA = 2
                WHERE donhang.DH_MA = $msdh";
        $result = $this->conn->query($sql);
        return json_encode($result);
    }

    public function getDetailOrder($msdh)
    {
        $sql = "SELECT chitietdonhang.SP_MA MSHH, sanpham.SP_TEN tensanpham, thuonghieu.THUONGHIEU_TEN thuonghieu, chitietdonhang.SIZE_KICHCO size, chitietdonhang.DH_MA MSDH,
                        chitietdonhang.CTDH_GIA gia, chitietdonhang.CTDH_SOLUONG soluong, hinhanh.HA_DUONGDAN srcHinh
                FROM chitietdonhang, hinhanh, sanpham, nhomsanpham, thuonghieu
                WHERE chitietdonhang.DH_MA = $msdh AND sanpham.NHOM_MA = nhomsanpham.NHOM_MA AND chitietdonhang.SP_MA = sanpham.SP_MA AND nhomsanpham.THUONGHIEU_MA = thuonghieu.THUONGHIEU_MA
                AND
                sanpham.SP_MA = hinhanh.SP_MA
                GROUP BY (MSHH)";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSDH'][] = $arr['MSDH'];
            $array['MSHH'][] = $arr['MSHH'];
            $array['size'][] = $arr['size'];
            $array['gia'][] = $arr['gia'];
            $array['soluong'][] = $arr['soluong'];
            $array['srcHinh'][] = $arr['srcHinh'];
            $array['tensanpham'][] = $arr['tensanpham'];
            $array['thuonghieu'][] = $arr['thuonghieu'];
        }
        return json_encode($array);
    }

    public function getEditImage($mshh)
    {
        $sql = "SELECT sanpham.SP_TEN tensanpham, hinhanh.HA_DUONGDAN srcHinh
        FROM sanpham, hinhanh
        WHERE hinhanh.SP_MA = sanpham.SP_MA AND sanpham.SP_MA = $mshh";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['tensanpham'][] = $arr['tensanpham'];
            $array['srcHinh'][] = $arr['srcHinh'];
        }
        return json_encode($array);
    }

    public function deteleImageItem($mshh, $srchinh)
    {
        $srchinh = mysqli_real_escape_string($this->conn, $srchinh);
        $sql = "DELETE FROM `hinhanh` 
                WHERE `hinhanh`.`SP_MA` = $mshh
                        AND `hinhanh`.`HA_DUONGDAN` = '$srchinh'";
        $array = [];
        $result = $this->conn->query($sql);
        $a = pathinfo($srchinh, PATHINFO_EXTENSION);
        $link = "../SusuSneaker/public/image/imageItems/" . basename($srchinh);
        unlink("$link");
        if ($result === false) {
            return false;
        }
        return true;
    }

    public function addImageItem($mshh, $nameImageArr)
    {
        $result = array(
            "result" => "false"
        );
        $targetDocument = "../../../../SusuSneaker/public/image/imageItems/";
        // echo $idItem;
        for ($i = 0; $i < count($nameImageArr); $i++) {
            $urlImage = $targetDocument . basename($nameImageArr[$i]);
            $urlImage = mysqli_real_escape_string($this->conn, $urlImage);
            $sqlAddImage = "INSERT into hinhanh(hinhanh.SP_MA, hinhanh.HA_DUONGDAN) 
                                VALUES ($mshh, '$urlImage')
                ";
            $resultInsertAddImage = $this->conn->query($sqlAddImage);
            // echo $urlImage;
            if ($resultInsertAddImage) {
                // echo "Them url hinh thanh cong";
                $result = array(
                    "result" => "true"
                );
            }
        }
        return json_encode($result);
    }
}
