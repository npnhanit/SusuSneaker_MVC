<?php

use function PHPSTORM_META\type;

class Ajax extends Controller
{

    public $UserModel;
    public $ItemsModel;

    function __construct()
    {
        $this->UserModel = $this->model('UserModel');
        $this->ItemsModel = $this->model('ItemsModel');
        $this->AddressModel = $this->model('AddressModel');
    }

    public function checkUserName()
    {
        if (isset($_POST['userName']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $userName = $_POST['userName'];
            $result = $this->UserModel->checkUserName($userName);
            echo $result;
        } else {
            echo "
                    <script>
                        alert('Truy cập không đúng cách');
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }


    public function addGroupItem()
    {
        if ($_POST['tennhomgiay'] && $_POST['thuonghieugiay']) {
            $tennhomgiay = $_POST['tennhomgiay'];
            $thuonghieugiay = $_POST['thuonghieugiay'];
        } else {
            echo "
                    <script>
                        alert('Truy cập không đúng cách');
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
        //insert data
        $resultJson = $this->ItemsModel->insertTrademark($tennhomgiay, $thuonghieugiay);
        // Show result
        $result = json_decode($resultJson)->result;
        if ($result == true) {
            echo "Thêm nhóm giày thành công";
            return;
        } else if ($result == false) {
            echo "Thêm nhóm giày thất bại";
            return;
        } else {
            echo "Thêm nhóm giày thất bại";
            return;
        }
    }

    public function checkGroupItem()
    {
        if (isset($_POST['tennhomgiay'])) {
            $tennhomgiay = $_POST['tennhomgiay'];
            $result = $this->ItemsModel->checkGroupItems($tennhomgiay);
            echo $result;
        } else {
            echo "
                    <script>
                        alert('Truy cập không đúng cách');
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function addItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['tensanpham'])) {
                $nameItem = $_POST['tensanpham'];
                // echo $nameItem;
            } else {
                echo "Lỗi khi thêm tên sản phẩm";
                return;
            }

            if (isset($_POST['giasanpham'])) {
                $priceItem = $_POST['giasanpham'];
                // echo $priceItem;
            } else {
                echo "Lỗi khi thêm giá sản phẩm";
                return;
            }
            if (isset($_POST['theloai'])) {
                $type = $_POST['theloai'];
                // echo $type;
            } else {
                echo "Lỗi khi chọn thể loại";
                return;
            }
            if (isset($_POST['size'])) {
                $size = $_POST['size'];
                $soluong = array();
                for ($i = 0; $i < count($size); $i++) {
                    $soluong[$i] = $_POST[$size[$i]];
                    // echo $size[$i] . '+' . $soluong[$i];
                }
            } else {
                echo "Bạn chưa nhập size và số lượng";
                return;
            }

            if (isset($_FILES['file'])) {
                $namesFile = $_FILES['file']['name'];
                $tempLocation = $_FILES['file']['tmp_name'];
                $errorsFile = $_FILES['file']['error'];
                $sizesFile = $_FILES['file']['size'];

                //count file upload
                $numFile = count($namesFile);
                $countFile = 0;

                $targetDocument = "public/image/imageItems/";
                $targetFile = array();

                $allowUpload = true;


                for ($i = 0; $i < $numFile; $i++) {
                    if ($errorsFile[$i] == 0) {

                        $typesFile[$i] = pathinfo($namesFile[$i], PATHINFO_EXTENSION);
                        $targetFile[$i] = $targetDocument . basename($namesFile[$i]);
                        // echo $targetFile[$i];
                        // echo "upload thanh cong file " . $namesFile[$i];
                        $check = getimagesize($tempLocation[$i]);
                        if ($check !== false)
                            $allowUpload = true;
                        else {
                            echo "file khong phai hinh anh";
                            $allowUpload = false;
                        }

                        if (file_exists($targetFile[$i])) {
                            echo "The filename already exists";
                            $allowUpload = false;
                        }

                        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

                        if (!in_array($typesFile[$i], $allowtypes)) {
                            $allowUpload = false;
                        }

                        if ($allowUpload) {
                            if (move_uploaded_file($tempLocation[$i], $targetFile[$i])) {
                                // echo "upload file thanh cong";
                            } else {
                                echo "Lỗi khi chuyển file vào thư mục";
                                return;
                            }
                        } else {
                            echo "Lỗi kiểu file, kích cở file,...";
                            return;
                        }
                    } else {
                        echo "Lỗi khi upload file";
                        return;
                    }
                }
            } else {
                echo "Bạn chưa thêm hình ảnh cho sản phẩm";
                return;
            }

            if (isset($_POST['mota'])) {
                $mota = $_POST['mota'];
            } else {
                echo "Lỗi khi thêm mô tả";
                return;
            }

            // Thêm vào DB
            $resultJson = $this->ItemsModel->addItem($nameItem, $priceItem, $type, $mota, $size, $soluong, $namesFile);
            // Show result
            $result = json_decode($resultJson)->result;

            if ($result == true) {
                echo "Thêm sản phẩm thành công";
                return;
            } else if ($result == false) {
                echo "Thêm sản phẩm thất bại";
                for ($i = 0; $i < $numFile; $i++) {
                    $typesFile[$i] = pathinfo($namesFile[$i], PATHINFO_EXTENSION);
                    $targetFile[$i] = $targetDocument . basename($namesFile[$i]);
                    unlink($targetFile[$i]);
                }
                return;
            }
        }
    }

    public function checkSize()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            $result = $this->ItemsModel->checkSize($mshh);
            echo $result;
        } else {
            echo "
                    <script>
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function addCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['size']))
                $size = $_POST['size'];
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['mskh']))
                $mskh = $_POST['mskh'];
            if (isset($_POST['soluong']))
                $soluong = $_POST['soluong'];
            echo $mshh;
            echo " kh: ". $mskh." ";
            echo $soluong;
            echo $size;
            $result = $this->ItemsModel->addCart($mskh, $mshh, $soluong, $size);
            echo $result;
        } else {
            echo "
                    <script>
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function countItemCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser']))
                $id = $_POST['idUser'];
            $result = json_decode($this->ItemsModel->countItemCart($id));
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        } else {
            echo "
                    <script>
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser']))
                $id = $_POST['idUser'];
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['soLuong']))
                $soluong = $_POST['soLuong'];
            if (isset($_POST['size']))
                $size = $_POST['size'];
            $result = $this->ItemsModel->updateCart($id, $mshh, $soluong, $size);
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        } else {
            echo "
                    <script>
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function deleteItemCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser']))
                $id = $_POST['idUser'];
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['soLuong']))
                $soluong = $_POST['soLuong'];
            if (isset($_POST['size']))
                $size = $_POST['size'];
            $result = $this->ItemsModel->deleteItemCart($id, $mshh, $soluong, $size);
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        } else {
            echo "
                    <script>
                        window.location = '../../../../Home/SayHi';
                    </script>
                ";
        }
    }

    public function getProvince()
    {
        $result = $this->AddressModel->getProvince();
        if ($result == false) {
            echo $result;
            return;
        }
        echo $result;
    }

    public function getDistrict()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idProvince']))
                $idProvince = $_POST['idProvince'];
            $result = $this->AddressModel->getDistrict($idProvince);
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        }
    }

    public function getWard()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idDistrict']))
                $idDistrict = $_POST['idDistrict'];
            $result = $this->AddressModel->getWard($idDistrict);
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        }
    }

    public function getItemPay()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
        }
        $result = $this->ItemsModel->getItemPay($mshh);
        if ($result == false) {
            echo $result;
            return;
        }
        echo $result;
    }

    public function addOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser'])) {
                $idUser = $_POST['idUser'];
            } else {
                echo "Not find var post";
                return;
            }
            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            } else {
                echo "Not find var post";
                return;
            }
            if (isset($_POST['fullName'])) {
                $fullName = $_POST['fullName'];
            } else {
                echo "Not find var post";
                return;
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
            } else {
                echo "Not find var post";
                return;
            }
            if (isset($_POST['nameWard'])) {
                $nameWard = $_POST['nameWard'];
            } else {
                echo "Not find var post";
                return;
            }
            if (isset($_POST['obj_cart'])) {
                $obj_cart = $_POST['obj_cart'];
            } else {
                echo "Not find var post";
                return;
            }
            $result = $this->ItemsModel->addOrder($idUser, $address, $fullName, $phone, $nameWard, $obj_cart);
            if ($result == false) {
                echo $result;
                return;
            }
            echo $result;
        }
    }

    public function updateStateOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['msdh']))
                $msdh = $_POST['msdh'];
            if (isset($_POST['stateUpdate']))
                $stateUpdate = $_POST['stateUpdate'];
        } else {
            echo false;
            return;
        }
        $result = $this->ItemsModel->updateStateOrder($msdh, $stateUpdate);
        if ($result == false) {
            echo $result;
            return;
        }
        echo $result;
    }

    public function updateAddressUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser']))
                $idUser = $_POST['idUser'];
            if (isset($_POST['idGroup']))
                $idGroup = $_POST['idGroup'];
            if (isset($_POST['address']))
                $address = $_POST['address'];
            if (isset($_POST['nameWard']))
                $nameWard = $_POST['nameWard'];
        } else {
            echo false;
            return;
        }
        if ($idGroup == 2) { //customer
            $result = $this->UserModel->updateAddressCustomer($idUser, $address, $nameWard);
        } else if ($idGroup == 1) { //employee
            $result = $this->UserModel->updateAddressEmployee($idUser, $address, $nameWard);
        }
        if ($result == false) {
            echo $result;
            return;
        }
        echo $result;
    }

    public function updateInfoUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idUser']))
                $idUser = $_POST['idUser'];
            if (isset($_POST['idGroup']))
                $idGroup = $_POST['idGroup'];
            if (isset($_POST['fullName']))
                $fullName = $_POST['fullName'];
            if (isset($_POST['phone']))
                $phone = $_POST['phone'];
        } else {
            echo false;
            return;
        }
        if ($idGroup == 2) { //customer
            $result = $this->UserModel->updateInfoCustomer($idUser, $fullName, $phone);
        } else if ($idGroup == 1) { //employee
            $result = $this->UserModel->updateInfoEmployee($idUser, $fullName, $phone);
        }
        if ($result == false) {
            echo $result;
            return;
        }
        echo $result;
    }

    public function getAmount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['size']))
                $size = $_POST['size'];
        } else {
            echo false;
            return;
        }
        $result = $this->ItemsModel->getAmount($mshh, $size);
        if ($result == false) {
            echo false;
            return;
        }
        echo $result;
    }

    public function updateItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['size']))
                $size = $_POST['size'];
            if (isset($_POST['soLuong']))
                $soLuong = $_POST['soLuong'];
            if (isset($_POST['gia']))
                $gia = $_POST['gia'];
        } else {
            echo false;
            return;
        }
        $result = $this->ItemsModel->updateItem($mshh, $size, $soLuong, $gia);
        if ($result == false) {
            echo false;
            return;
        }
        echo $result;
    }

    public function deleteItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
        } else {
            echo false;
            return;
        }
        $result = $this->ItemsModel->deleteItem($mshh);
        if ($result == false) {
            echo false;
            return;
        }
        echo $result;
    }

    public function searchItemEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['value']))
                $value = $_POST['value'];
        } else {
            echo false;
            return;
        }
        $getItems = json_decode($this->ItemsModel->searchItemEdit($value));
        $getFullSize = json_decode($this->ItemsModel->getFullSize());
        if ($getItems == false) {
            echo false;
            return;
        }
        require "mvc/views/pages/admin/searchItemEdit.php";
    }

    public function confirmOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['msdh']))
                $msdh = $_POST['msdh'];
        } else {
            echo false;
            return;
        }
        $confirmOrder = json_decode($this->ItemsModel->confirmOrder($msdh));
        return $confirmOrder;
    }

    public function cancelOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['msdh']))
                $msdh = $_POST['msdh'];
        } else {
            echo false;
            return;
        }
        $cancelOrder = json_decode($this->ItemsModel->cancelOrder($msdh));
        return $cancelOrder;
    }

    public function seenOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['msdh']))
                $msdh = $_POST['msdh'];
        } else {
            echo false;
            return;
        }
        $cancelOrder = json_decode($this->ItemsModel->updateStateOrder($msdh, 2));
        return $cancelOrder;
    }

    public function searchOrderEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['value']))
                $value1 = $_POST['value'];
        } else {
            echo false;
            return;
        }
        $getOrderSearch = json_decode($this->ItemsModel->searchOrderEdit($value1));
        if ($getOrderSearch == false) {
            echo false;
            return;
        }
        require "mvc/views/pages/admin/searchOrderEdit.php";
    }

    public function detailOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['msdh']))
                $msdh = $_POST['msdh'];
        } else {
            echo false;
            return;
        }
        $getDetailOrder = json_decode($this->ItemsModel->getDetailOrder($msdh));
        $getOrder = json_decode($this->ItemsModel->searchOrderEdit($msdh));
        if ($getDetailOrder == false) {
            echo false;
            return;
        }
        require "mvc/views/pages/admin/detailOrder.php";
    }

    public function addCustomer()
    {
        // Get data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                if (strpos($username, " ")) {
                    echo " Tên đăng nhập không được chứa khoảng trắng
                    ";
                }
            } else {
                echo 'Not find Username';
                return;
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                echo 'Not find Password';
                return;
            }
            if (isset($_POST['confirmpassword'])) {
                $confirmpassword = $_POST['confirmpassword'];
                if ($password != $confirmpassword) {
                    echo "Mật khẩu không trùng khớp;
                    ";
                }
            } else {
                echo 'Not find ConfirmPassword';
                return;
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
                $strphone = (string)$phone;
                if (strlen($strphone) != 10) {
                    echo "Phone is not valid";
                }
            } else {
                echo 'Not find phone';
                return;
            }
            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            } else {
                echo 'Not find address';
                return;
            }
            if (isset($_POST['fullname'])) {
                $fullname = $_POST['fullname'];
            } else {
                echo 'Not find name';
                return;
            }
            if (isset($_POST['province'])) {
                $province = $_POST['province'];
            } else {
                echo 'Not find province';
                return;
            }
            if (isset($_POST['district'])) {
                $district = $_POST['district'];
            } else {
                echo 'Not find district';
                return;
            }
            if (isset($_POST['ward'])) {
                $ward = $_POST['ward'];
            } else {
                echo 'Not find district';
                return;
            }
            $password = md5($password);
            $avatar = '../../../../SusuSneaker/public/image/avatar/avatar_default.png';
        } else {
            echo "not register";
            // echo "
            //         <script>
            //             window.location = '../../../../SusuSneaker/Home/SayHi';
            //         </script>
            //     ";
        }

        // Insert data
        $resultJson = $this->UserModel->insertCustomer($username, $password, $fullname, $phone, $address, $avatar, $ward, $district, $province);
        // Show result
        $result = json_decode($resultJson)->result;
        if ($result == "True") {
            echo "Thêm khách hàng thành công";
            return;
        } else if ($result == "False") {
            echo "Thêm khách hàng không thành công";
            return;
        } else {
            echo "
                <script>
                    window.location = '../../../../SusuSneaker/Home/SayHi';
                </script>
            ";
        }
    }

    public function searchUserName()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']))
                $username = $_POST['username'];
        } else {
            echo false;
            return;
        }
        $getUserName = json_decode($this->UserModel->searchUserName($username));
        if ($getUserName == false) {
            echo "false";
            return;
        }
        require "mvc/views/pages/admin/searchUserName.php";
    }

    public function searchEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']))
                $username = $_POST['username'];
        } else {
            echo false;
            return;
        }
        $getUserName = json_decode($this->UserModel->searchEmployee($username));
        if ($getUserName == false) {
            echo "false";
            return;
        }
        require "mvc/views/pages/admin/searchEmployee.php";
    }

    public function addEmployee()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                if (strpos($username, " ")) {
                    echo " Tên đăng nhập không được chứa khoảng trắng
                    ";
                }
            } else {
                echo 'Not find Username';
                return;
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                echo 'Not find Password';
                return;
            }
            if (isset($_POST['confirmpassword'])) {
                $confirmpassword = $_POST['confirmpassword'];
                if ($password != $confirmpassword) {
                    echo "Mật khẩu không trùng khớp;
                    ";
                }
            } else {
                echo 'Not find ConfirmPassword';
                return;
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
                $strphone = (string)$phone;
                if (strlen($strphone) != 10) {
                    echo "Phone is not valid";
                }
            } else {
                echo 'Not find phone';
                return;
            }
            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            } else {
                echo 'Not find address';
                return;
            }
            if (isset($_POST['fullname'])) {
                $fullname = $_POST['fullname'];
            } else {
                echo 'Not find name';
                return;
            }
            if (isset($_POST['province'])) {
                $province = $_POST['province'];
            } else {
                echo 'Not find province';
                return;
            }
            if (isset($_POST['district'])) {
                $district = $_POST['district'];
            } else {
                echo 'Not find district';
                return;
            }
            if (isset($_POST['ward'])) {
                $ward = $_POST['ward'];
            } else {
                echo 'Not find district';
                return;
            }
            $password = md5($password);
            $avatar = '../../../../SusuSneaker/public/image/avatar/avatar_default.png';
        } else {
            echo "not find";
            // echo "
            //         <script>
            //             window.location = '../../../../SusuSneaker/Home/SayHi';
            //         </script>
            //     ";
        }

        // Insert data
        $resultJson = $this->UserModel->insertEmployee($username, $password, $fullname, $phone, $address, $avatar, $ward, $district, $province);
        // Show result
        $result = json_decode($resultJson)->result;
        if ($result == "True") {
            echo "Thêm nhân viên thành công";
            return;
        } else if ($result == "False") {
            echo "Thêm nhân viên không thành công";
            return;
        } else {
            echo "
                <script>
                    window.location = '../../../../SusuSneaker/Home/SayHi';
                </script>
            ";
        }
    }

    public function getEditImage()
    {
        if (isset($_POST['mshh']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            $getEditImage = $this->ItemsModel->getEditImage($mshh);
            if ($getEditImage == false) {
                echo "false";
                return;
            }
            print_r($getEditImage);
        } else {
            echo false;
            return;
        }
    }

    public function deteleImageItem()
    {
        if (isset($_POST['mshh']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['mshh']))
                $mshh = $_POST['mshh'];
            if (isset($_POST['srchinh']))
                $srchinh = $_POST['srchinh'];
            $deteleImageItem = $this->ItemsModel->deteleImageItem($mshh, $srchinh);
            if ($deteleImageItem == false) {
                echo false;
                return;
            }
            echo true;
        } else {
            echo false;
            return;
        }
    }

    

    public function UpdateImageItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['mshh'])) {
                $mshh = $_POST['mshh'];
                // echo $priceItem;
            } else {
                echo "Not find ID";
                return;
            }
            if (isset($_FILES['file'])) {
                $namesFile = $_FILES['file']['name'];
                $tempLocation = $_FILES['file']['tmp_name'];
                $errorsFile = $_FILES['file']['error'];
                $sizesFile = $_FILES['file']['size'];

                //count file upload
                $numFile = count($namesFile);
                $countFile = 0;

                $targetDocument = "public/image/imageItems/";
                $targetFile = array();

                $allowUpload = true;


                for ($i = 0; $i < $numFile; $i++) {
                    if ($errorsFile[$i] == 0) {

                        $typesFile[$i] = pathinfo($namesFile[$i], PATHINFO_EXTENSION);
                        $targetFile[$i] = $targetDocument . basename($namesFile[$i]);
                        // echo $targetFile[$i];
                        // echo "upload thanh cong file " . $namesFile[$i];
                        $check = getimagesize($tempLocation[$i]);
                        if ($check !== false)
                            $allowUpload = true;
                        else {
                            echo "file khong phai hinh anh";
                            $allowUpload = false;
                        }

                        if (file_exists($targetFile[$i])) {
                            echo "The filename already exists";
                            $allowUpload = false;
                        }

                        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

                        if (!in_array($typesFile[$i], $allowtypes)) {
                            $allowUpload = false;
                        }

                        if ($allowUpload) {
                            if (move_uploaded_file($tempLocation[$i], $targetFile[$i])) {
                                // echo "upload file thanh cong";
                            } else {
                                echo "Lỗi khi chuyển file vào thư mục";
                                return;
                            }
                        } else {
                            echo "Lỗi kiểu file, kích cở file,...";
                            return;
                        }
                    } else {
                        echo "Lỗi khi upload file";
                        return;
                    }
                }
            } else {
                echo "Bạn chưa thêm hình ảnh cho sản phẩm";
                return;
            }

            // Thêm vào DB
            $resultJson = $this->ItemsModel->addImageItem($mshh, $namesFile);
            // Show result
            $result = json_decode($resultJson)->result;

            if ($result == true) {
                echo "Thêm hình ảnh thành công";
                return;
            } else if ($result == false) {
                echo "Thêm sản phẩm thất bại";
                for ($i = 0; $i < $numFile; $i++) {
                    $typesFile[$i] = pathinfo($namesFile[$i], PATHINFO_EXTENSION);
                    $targetFile[$i] = $targetDocument . basename($namesFile[$i]);
                    unlink($targetFile[$i]);
                }
                return;
            }
        }
    }

    public function searchItem(){
        if(isset($_POST['value']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $value = $_POST['value'];
            $result = $this->ItemsModel->search($value);
            echo $result;
        }else{
            return;
        }
    }

    public function updateState(){
        if(isset($_POST['state']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $userName = $_POST['msnv'];
            $state = $_POST['state'];
            if($state == 'Đang hoạt động')
                $idGroup = 1;
            else
                $idGroup = 3;
            $result = $this->UserModel->updateState($userName, $idGroup);
            echo $result;
        }else{
            return;
        }
    }
}
