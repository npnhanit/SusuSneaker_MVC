<?php

class Process extends Controller
{

    public $UserModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    public function registration()
    {
        // Get data
        if (isset($_POST['register'])) {
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
            echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }

        // Insert data
        $resultJson = $this->UserModel->insertCustomer($username, $password, $fullname, $phone, $address, $avatar, $ward, $district, $province);
        // Show result
        $result = json_decode($resultJson)->result;
        if ($result == "True") {
            echo "
                <script>
                    window.location = '../../../../SusuSneaker/Login/SayHi';
                </script>
            ";
        } else if ($result == 'False') {
            echo "
                <script>
                    alert('Đăng kí không thành công');
                    window.location = '../../../../SusuSneaker/Login/Register';
                </script>
            ";
        } else {
            echo "
                <script>
                    window.location = '../../../../SusuSneaker/Home/SayHi';
                </script>
            ";
        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $urlpre = $_POST['urlpre'];
            $password = md5($password);
            $result = json_decode($this->UserModel->checkLogin($userName, $password));
            if ($result->result == 'true') {
                $_SESSION['userName'] = $userName;
                $_SESSION['idUser'] = $result->idUser;
                $_SESSION['idGroup'] = $result->idGroup;
                if ($result->idGroup == 2) {
                    $idKH = json_decode($this->UserModel->getIdKH($result->idUser));
                    $_SESSION['idKH'] = $idKH->idKH;
                    echo "
                    <script>
                        window.location = window.localStorage.getItem('prePage');
                    </script>
                ";
                } elseif ($result->idGroup == 1) {
                    $idNV = json_decode($this->UserModel->getIdNV($result->idUser));
                    $_SESSION['idKH'] = $idNV->idNV;
                    echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin';
                    </script>
                ";
                }elseif ($result->idGroup == 0) {
                    echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin';
                    </script>
                ";
                }elseif ($result->idGroup == 3) {
                    $idNV = json_decode($this->UserModel->getIdNV($result->idUser));
                    $_SESSION['idKH'] = $idNV->idNV;
                    echo "
                    <script>
                        alert('Tài khoản đã bị vô hiệu hoá');
                        window.location = '../../../../SusuSneaker/Process/logout';
                    </script>
                ";

                }else{
                    echo "
                    <script>
                        alert('Truy cập không đúng cách')
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
                }
            } else {
                echo "
                    <script>
                        alert('Mật khẩu hoặc tài khoản không đúng, vui lòng nhập lại!')
                        window.location = '../../../../SusuSneaker/Login/SayHi';
                    </script>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('Truy cập không đúng cách')
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['userName'])) {
            session_unset();
            echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Truy cập không đúng cách')
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
    }
}
