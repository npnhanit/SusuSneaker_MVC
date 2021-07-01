<?php
class UserModel extends connDB
{

    public function insertUser($userName, $password, $idGroup)
    {
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $password = mysqli_real_escape_string($this->conn, $password);
        $test = "select taikhoan.TK_MA idUser, taikhoan.TK_TENDANGNHAP userName, taikhoan.TK_MATKHAU password, taikhoan.QTC_MA idGroup 
                from taikhoan where taikhoan.TK_TENDANGNHAP = '$userName'        
        ";
        $result = mysqli_num_rows($this->conn->query($test));
        if ($result > 0) {
            return false;
        }
        //userName	password	idGroup
        $sql = "insert into taikhoan(taikhoan.TK_TENDANGNHAP, taikhoan.TK_MATKHAU, taikhoan.QTC_MA)
                values ('$userName', '$password', $idGroup)
        ";
        return $this->conn->query($sql);
    }

    public function insertCustomer($userName, $password, $fullName, $phone, $address, $avatar, $ward, $district, $province)
    {
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $password = mysqli_real_escape_string($this->conn, $password);
        $fullName = mysqli_real_escape_string($this->conn, $fullName);
        $address = mysqli_real_escape_string($this->conn, $address);
        $sqlIdWard = "SELECT xaphuong.XAPHUONG_MA idward
                    FROM xaphuong, quanhuyen, tinhthanh
                    WHERE xaphuong.XAPHUONG_TEN = '$ward' AND xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA
                        AND quanhuyen.QUANHUYEN_TEN = '$district' AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA
                        AND tinhthanh.TINHTHANH_TEN = '$province'";
        $resultIdWard = $this->conn->query($sqlIdWard);
        if ($resultIdWard === false) {
            return false;
        } else {
            $row = mysqli_fetch_array($resultIdWard);
            $idWard = $row['idward'];
        }
        $this->conn->autocommit(false);
        $this->conn->begin_transaction();
        $error = 0;
        $result = $this->insertUser($userName, $password, 2);
        if ($result == false) {
            $array = array(
                "result" => "Error: Insert user."
            );
            $error++;
        } else {
            $getIdCustomer = mysqli_fetch_array($this->conn->query("select taikhoan.TK_MA idUser from taikhoan where taikhoan.TK_TENDANGNHAP =  '$userName'"));
            $idCustomer = $getIdCustomer['idUser'];
            
            $sqlInsert = "insert into khachhang(TK_MA, KH_TEN, KH_DIACHI, KH_SODIENTHOAI, KH_ANHDAIDIEN, XAPHUONG_MA ) 
                        values ($idCustomer,'$fullName','$address', '$phone', '$avatar', '$idWard')
            ";
            $resultInsert = $this->conn->query($sqlInsert);
            if ($resultInsert) {
                $array = array(
                    "result" => "True"
                );
            } else {
                $array = array(
                    "result" => "False"
                );
                $error++;
            }
        }
        if ($error == 0) {
            $this->conn->commit();
            return json_encode($array);
        } else {
            $this->conn->rollback();
            return json_encode($array);
        }
    }

    public function insertEmployee($userName, $password, $fullName, $phone, $address, $avatar, $ward, $district, $province)
    {
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $password = mysqli_real_escape_string($this->conn, $password);
        $fullName = mysqli_real_escape_string($this->conn, $fullName);
        $address = mysqli_real_escape_string($this->conn, $address);
        $idGroup = 1;
        $sqlIdWard = "SELECT xaphuong.XAPHUONG_MA idward
                    FROM xaphuong, quanhuyen, tinhthanh
                    WHERE xaphuong.XAPHUONG_TEN = '$ward' AND xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA
                        AND quanhuyen.QUANHUYEN_TEN = '$district' AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA
                        AND tinhthanh.TINHTHANH_TEN = '$province'";
        $resultIdWard = $this->conn->query($sqlIdWard);
        if ($resultIdWard === false) {
            return false;
        } else {
            $row = mysqli_fetch_array($resultIdWard);
            $idWard = $row['idward'];
        }
        $this->conn->autocommit(false);
        $this->conn->begin_transaction();
        $error = 0;
        $result = $this->insertUser($userName, $password, $idGroup);
        if ($result == false) {
            $array = array(
                "error" => "Error: Insert user."
            );
            $error++;
        } else {
            $getIdEmployee = mysqli_fetch_array($this->conn->query("select taikhoan.TK_MA idUser from taikhoan where taikhoan.TK_TENDANGNHAP =  '$userName'"));
            $idEmployee = $getIdEmployee['idUser'];
            $sqlInsert = "insert into nhanvien(nhanvien.TK_MA, nhanvien.NV_TEN, nhanvien.NV_DIACHI, nhanvien.NV_SODIENTHOAI, nhanvien.NV_ANHDAIDIEN, nhanvien.XAPHUONG_MA) 
                            values ($idEmployee,'$fullName','$address', '$phone', '$avatar', '$idWard');
            ";
            $resultInsert = $this->conn->query($sqlInsert);
            if ($resultInsert) {
                $array = array(
                    "result" => "True"
                );
            } else {
                $array = array(
                    "result" => "False"
                );
                $error++;
            }
        }
        if ($error == 0) {
            $this->conn->commit();
            return json_encode($array);
        } else {
            $this->conn->rollback();
            return json_encode($array);
        }
    }

    public function checkUserName($userName)
    {
        // $userName = mysqli_real_escape_string($this->conn, $userName);
        $test = "select taikhoan.TK_MA idUser from taikhoan where taikhoan.TK_TENDANGNHAP =  '$userName'        
        ";
        $number = mysqli_num_rows($this->conn->query($test));
        $result = "";
        if ($number > 0) {
            $result = "Tên đăng nhập đã tồn tại";
        }
        return $result;
    }

    public function checkLogin($userName, $password)
    {
        // $userName = mysqli_real_escape_string($this->conn, $userName);
        // $userName = mysqli_real_escape_string($this->conn, $password);
        $sql = "select taikhoan.TK_MA idUser, taikhoan.TK_TENDANGNHAP userName, taikhoan.TK_MATKHAU password, taikhoan.QTC_MA idGroup 
                from taikhoan where taikhoan.TK_TENDANGNHAP = '$userName' ";
        $array = mysqli_fetch_array($this->conn->query($sql));
        $result = array(
            "result" => "false"
        );
        if (isset($array['userName'])) {
            if ($userName == $array['userName'] && $password == $array['password']) {
                $result = array(
                    "result" => "true",
                    "idGroup" => $array['idGroup'],
                    "idUser" => $array['idUser']
                );
            }
        }
        return json_encode($result);
    }

    public function getIdKH($idUser)
    {
        $sql = "SELECT KH_MA FROM khachhang WHERE khachhang.TK_MA = $idUser";
        $result = $this->conn->query($sql);
        $array = mysqli_fetch_array($this->conn->query($sql));
        $result = array(
            "result" => "false"
        );
        $result = array(
            "idKH" => $array['KH_MA']
        );

        return json_encode($result);
    }

    public function getIdNV($idUser)
    {
        $sql = "SELECT NV_MA FROM nhanvien WHERE nhanvien.TK_MA = $idUser";
        $result = $this->conn->query($sql);
        $array = mysqli_fetch_array($this->conn->query($sql));
        $result = array(
            "result" => "false"
        );
        $result = array(
            "idNV" => $array['NV_MA']
        );

        return json_encode($result);
    }

    public function getInfoCustomer($idUser)
    {
        $sql = "SELECT a.TK_MA idUser, b.KH_MA idKH, a.TK_TENDANGNHAP userName, a.QTC_MA idGroup, b.KH_TEN HoTen,
                        b.KH_DIACHI DiaChi,b.KH_SODIENTHOAI SoDienThoai,b.KH_ANHDAIDIEN avatar, 
                        e.XAPHUONG_TEN ward, c.QUANHUYEN_TEN district, d.TINHTHANH_TEN province
                FROM taikhoan a, khachhang b, quanhuyen c, tinhthanh d, xaphuong e
                where a.TK_MA = $idUser AND b.TK_MA = a.TK_MA AND e.XAPHUONG_MA = b.XAPHUONG_MA 
                        AND c.QUANHUYEN_MA = e.QUANHUYEN_MA AND d.TINHTHANH_MA = c.TINHTHANH_MA";
        $result = mysqli_fetch_array($this->conn->query($sql));
        return json_encode($result);
    }

    public function getInfoEmployee($idUser)
    {
        $sql = "SELECT a.TK_MA idUser, a.TK_TENDANGNHAP userName, a.QTC_MA idGroup, b.NV_TEN HoTen,
                        b.NV_DIACHI DiaChi, b.NV_SODIENTHOAI SoDienThoai, b.NV_ANHDAIDIEN avatar, 
                        e.XAPHUONG_TEN ward, c.QUANHUYEN_TEN district, d.TINHTHANH_TEN province
                FROM taikhoan a, nhanvien b, quanhuyen c, tinhthanh d, xaphuong e
                where a.TK_MA = $idUser AND b.TK_MA = a.TK_MA AND e.XAPHUONG_MA = b.XAPHUONG_MA 
                        AND c.QUANHUYEN_MA = e.QUANHUYEN_MA AND d.TINHTHANH_MA = c.TINHTHANH_MA";
        $result = mysqli_fetch_array($this->conn->query($sql));
        return json_encode($result);
    }

    public function updateAddressCustomer($idUser, $address, $nameWard)
    {
        // $nameWard = mysqli_real_escape_string($this->conn, $nameWard);
        $address = mysqli_real_escape_string($this->conn, $address);
        $sql_getIdWard = "SELECT XAPHUONG_MA id FROM xaphuong WHERE xaphuong.XAPHUONG_TEN = '$nameWard' ";
        $result_getIdWard = $this->conn->query($sql_getIdWard);
        if ($result_getIdWard === false) {
            echo "Not find ward";
            return $result_getIdWard;
        } else {
            $row = mysqli_fetch_array($result_getIdWard);
            $idWard = $row['id'];
        }
        $sql = "UPDATE khachhang
                SET khachhang.KH_DIACHI = '$address', khachhang.XAPHUONG_MA = '$idWard' 
                WHERE khachhang.KH_MA = $idUser";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAddressEmployee($idUser, $address, $nameWard)
    {
        // $nameWard = mysqli_real_escape_string($this->conn, $nameWard);
        $address = mysqli_real_escape_string($this->conn, $address);
        $sql_getIdWard = "SELECT XAPHUONG_MA FROM xaphuong WHERE xaphuong.XAPHUONG_TEN = '$nameWard' ";
        $result_getIdWard = $this->conn->query($sql_getIdWard);
        if ($result_getIdWard === false) {
            echo "Not find ward";
            return $result_getIdWard;
        } else {
            $row = mysqli_fetch_array($result_getIdWard);
            $idWard = $row['id'];
        }
        $sql = "UPDATE nhanvien 
                SET nhanvien.NV_DIACHI = '$address', nhanvien.XAPHUONG_MA = '$idWard' 
                WHERE nhanvien.TK_MA = $idUser";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateInfoEmployee($idUser, $fullName, $phone)
    {
        $fullName = mysqli_real_escape_string($this->conn, $fullName);
        $sql = "UPDATE nhanvien 
                SET nhanvien.NV_TEN = '$fullName', nhanvien.NV_SODIENTHOAI = '$phone'
                WHERE nhanvien.TK_MA = $idUser";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateInfoCustomer($idUser, $fullName, $phone)
    {
        $fullName = mysqli_real_escape_string($this->conn, $fullName);
        $sql = "UPDATE khachhang 
                SET khachhang.KH_TEN = '$fullName', khachhang.KH_SODIENTHOAI = '$phone'
                WHERE khachhang.KH_MA = $idUser";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getEmployeeEdit()
    {
        $sql = "SELECT nhanvien.TK_MA MSNV, nhanvien.NV_TEN HoTenNV, nhanvien.NV_SODIENTHOAI SoDienThoai, 
                        nhanvien.NV_DIACHI DiaChi, xaphuong.XAPHUONG_TEN ward, quanhuyen.QUANHUYEN_TEN district, 
                        tinhthanh.TINHTHANH_TEN province, taikhoan.TK_TENDANGNHAP
                FROM nhanvien, taikhoan, quanhuyen, tinhthanh, xaphuong
                WHERE nhanvien.TK_MA = taikhoan.TK_MA AND nhanvien.XAPHUONG_MA = XAPHUONG_MA 
                        and xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA 
                        and quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA
                ORDER BY MSNV ASC";
        $array = [];
        $result = $this->conn->query($sql);
        if ($result === false) {
            return false;
        }
        while ($arr = mysqli_fetch_array($result)) {
            $array['MSNV'][] = $arr['MSNV'];
            $array['HoTenNV'][] = $arr['HoTenNV'];
            $array['SoDienThoai'][] = $arr['SoDienThoai'];
            $array['DiaChi'][] = $arr['DiaChi'];
            $array['ward'][] = $arr['ward'];
            $array['district'][] = $arr['district'];
            $array['province'][] = $arr['province'];
        }
        return json_encode($array);
    }

    public function getInfoCustomerAdmin(){
        $sql = "SELECT taikhoan.TK_TENDANGNHAP tendangnhap, khachhang.KH_MA idKH, 
                        khachhang.KH_TEN tenkhachhang, khachhang.KH_SODIENTHOAI sodienthoai, khachhang.KH_DIACHI diachi, 
                        xaphuong.XAPHUONG_TEN xaphuong, quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh 
                FROM taikhoan, khachhang, xaphuong, quanhuyen, tinhthanh
                WHERE taikhoan.TK_MA = khachhang.TK_MA AND khachhang.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND
                        xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA";
        $array = [];
        $result = $this->conn->query($sql);
        if($result === false){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['idKH'][] = $arr['idKH'];
            $array['tenkhachhang'][] = $arr['tenkhachhang'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['diachi'][] = $arr['diachi'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
        }
        return json_encode($array);
    }

    public function getInfoEmployeeAdmin(){
        $sql = "SELECT taikhoan.TK_TENDANGNHAP tendangnhap, nhanvien.NV_MA idNV, taikhoan.QTC_MA idGroup,
                        nhanvien.NV_TEN tennhanvien, nhanvien.NV_SODIENTHOAI sodienthoai, nhanvien.NV_DIACHI diachi, 
                        xaphuong.XAPHUONG_TEN xaphuong, quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh 
                FROM taikhoan, nhanvien, xaphuong, quanhuyen, tinhthanh
                WHERE taikhoan.TK_MA = nhanvien.TK_MA AND nhanvien.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND
                        xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA";
        $array = [];
        $result = $this->conn->query($sql);
        if($result === false){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['idNV'][] = $arr['idNV'];
            $array['idGroup'][] = $arr['idGroup'];
            $array['tennhanvien'][] = $arr['tennhanvien'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['diachi'][] = $arr['diachi'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
        }
        return json_encode($array);
    }

    public function searchUserName($username){
        $username = mysqli_real_escape_string($this->conn, $username);
        $sql = "SELECT taikhoan.TK_TENDANGNHAP tendangnhap, khachhang.KH_MA idKH, 
                        khachhang.KH_TEN tenkhachhang, khachhang.KH_SODIENTHOAI sodienthoai, khachhang.KH_DIACHI diachi, 
                        xaphuong.XAPHUONG_TEN xaphuong, quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh 
                FROM taikhoan, khachhang, xaphuong, quanhuyen, tinhthanh
                WHERE taikhoan.TK_MA = khachhang.TK_MA AND khachhang.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND
                        xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA
                        AND taikhoan.TK_TENDANGNHAP REGEXP '$username'";
        $array = [];
        $result = $this->conn->query($sql);
        $count = mysqli_num_rows($this->conn->query($sql));
        if($result === false || $count == 0){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['idKH'][] = $arr['idKH'];
            $array['tenkhachhang'][] = $arr['tenkhachhang'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['diachi'][] = $arr['diachi'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
        }
        return json_encode($array);
    }

    public function searchEmployee($username){
        $username = mysqli_real_escape_string($this->conn, $username);
        $sql = "SELECT taikhoan.TK_TENDANGNHAP tendangnhap, taikhoan.QTC_MA idGroup, nhanvien.NV_MA idNV, 
                        nhanvien.NV_TEN tennhanvien, nhanvien.NV_SODIENTHOAI sodienthoai, nhanvien.NV_DIACHI diachi, 
                        xaphuong.XAPHUONG_TEN xaphuong, quanhuyen.QUANHUYEN_TEN quanhuyen, tinhthanh.TINHTHANH_TEN tinhthanh 
                FROM taikhoan, nhanvien, xaphuong, quanhuyen, tinhthanh
                WHERE taikhoan.TK_MA = nhanvien.TK_MA AND nhanvien.XAPHUONG_MA = xaphuong.XAPHUONG_MA AND
                        xaphuong.QUANHUYEN_MA = quanhuyen.QUANHUYEN_MA AND quanhuyen.TINHTHANH_MA = tinhthanh.TINHTHANH_MA
                        AND taikhoan.TK_TENDANGNHAP REGEXP '$username'";
        $array = [];
        $result = $this->conn->query($sql);
        $count = mysqli_num_rows($this->conn->query($sql));
        if($result === false || $count == 0){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['tendangnhap'][] = $arr['tendangnhap'];
            $array['idNV'][] = $arr['idNV'];
            $array['idGroup'][] = $arr['idGroup'];
            $array['tennhanvien'][] = $arr['tennhanvien'];
            $array['sodienthoai'][] = $arr['sodienthoai'];
            $array['diachi'][] = $arr['diachi'];
            $array['xaphuong'][] = $arr['xaphuong'];
            $array['quanhuyen'][] = $arr['quanhuyen'];
            $array['tinhthanh'][] = $arr['tinhthanh'];
        }
        return json_encode($array);
    }

    public function updateState($userName, $idGroup){
        $userName = mysqli_real_escape_string($this->conn, $userName);
        $sql = "UPDATE taikhoan
                SET taikhoan.QTC_MA = $idGroup
                WHERE taikhoan.TK_TENDANGNHAP = '$userName'";
        $result = $this->conn->query(($sql));
        return $result;
    }
}
