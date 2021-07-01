<?php
class AddressModel extends connDB{
    
    public function getProvince(){
        $sql = "SELECT tinhthanh.TINHTHANH_MA idProvince, tinhthanh.TINHTHANH_TEN nameProvince 
                FROM tinhthanh";
        $array = [];
        $result = $this->conn->query($sql);
        if($result === false){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['idProvince'][] = $arr['idProvince'];
            $array['nameProvince'][] = $arr['nameProvince'];
        }
        return json_encode($array);
    }

    public function getDistrict($idProvince){
        $sql = "SELECT quanhuyen.QUANHUYEN_MA idDistrict, quanhuyen.QUANHUYEN_TEN nameDistrict 
                FROM quanhuyen 
                WHERE quanhuyen.TINHTHANH_MA = $idProvince 
                ORDER BY quanhuyen.QUANHUYEN_MA ASC";
        $array = [];
        $result = $this->conn->query($sql);
        if($result === false){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['idDistrict'][] = $arr['idDistrict'];
            $array['nameDistrict'][] = $arr['nameDistrict'];
        }
        return json_encode($array);
    }

    public function getWard($idDistrict){
        $sql = "SELECT xaphuong.XAPHUONG_MA idWard, xaphuong.XAPHUONG_TEN nameWard 
                FROM xaphuong
                WHERE xaphuong.QUANHUYEN_MA = $idDistrict
                ORDER BY xaphuong.XAPHUONG_MA ASC";
        $array = [];
        $result = $this->conn->query($sql);
        if($result === false){
            return false;
        }
        while($arr = mysqli_fetch_array($result)){
            $array['idWard'][] = $arr['idWard'];
            $array['nameWard'][] = $arr['nameWard'];
        }
        return json_encode($array);
    }
}

?>