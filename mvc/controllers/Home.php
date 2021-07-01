<?php
class Home extends Controller
{

    public $UserModel;
    public $ItemsModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
        $this->ItemsModel = $this->model("ItemsModel");
    }

    public function SayHi()
    {
        $getItems = json_decode($this->ItemsModel->getItemsWithGroup());
        $getImage = json_decode($this->ItemsModel->getImageItems());
        $getTradeMark = json_decode($this->ItemsModel->getTradeMark());
        $getGroup = json_decode($this->ItemsModel->getGroup());
        $page = 'full_items';
        $title = 'Trang chủ';

        if (isset($_SESSION['userName'])) {
            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if ($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/SayHi';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/SayHi';
                    </script>
                ";
            }
        } else {
            $header = 'header_visitors';
            $infoUser = '';
        }
        $this->view_block('header', [
            'title' => $title,
            'json_infoUser' => $infoUser,
            'header_component' => $header,
            'json_group' => $getGroup
        ]);

        if (isset($_SESSION['userName'])) {
            if ($_SESSION['idGroup'] == 2) {
                $this->view('home', [
                    'page' => $page,
                    'json_items' => $getItems,
                    'json_image' => $getImage,
                    'json_trade_mark' => $getTradeMark,
                    'json_group' => $getGroup
                ]);
            } else {
                //trang admin
            }
        } else {
            $this->view('Home', [
                'page' => $page,
                'json_items' => $getItems,
                'json_image' => $getImage,
                'json_trade_mark' => $getTradeMark,
                'json_group' => $getGroup
            ]);
        }
    }

    public function Search()
    {
        if (isset($_POST['search'])) {
            $keyword = $_POST['search'];
            $result = json_decode($this->ItemsModel->search($keyword));
            $getGroupSearch = json_decode($this->ItemsModel->groupSearch($keyword));
            $getTradeMark = json_decode($this->ItemsModel->getTradeMark());

            $getGroup = json_decode($this->ItemsModel->getGroup());
            $page = 'search';
            $title = 'Tìm kiếm';

            if (isset($_SESSION['userName'])) {
                if ($_SESSION['idGroup'] == 2) { //view for customer
                    $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                    $header = 'header_customer';
                    $infoUser = $infoUserCustomer;
                } else if ($_SESSION['idGroup'] == 1) { // view for employee
                    // $infoUserEmployee = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
                    // $header = 'header_employee';
                    // $infoUser = $infoUserEmployee;
                    echo "
                        <script>
                            window.location = '../../../../SusuSneaker/Admin/SayHi';
                        </script>
                    ";
                } else {
                    // admintration
                    echo "
                        <script>
                            window.location = '../../../../SusuSneaker/Admin/SayHi';
                        </script>
                    ";
                }
            } else {
                $header = 'header_visitors';
                $infoUser = '';
            }
            $this->view_block('header', [
                'title' => $title,
                'json_infoUser' => $infoUser,
                'header_component' => $header,
                'json_group' => $getGroup
            ]);

            //
            if (isset($_SESSION['userName'])) {
                $infoUser = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $this->view('home', [
                    'page' => $page,
                    'json_infoUser' => $infoUser,
                    'page' => $page,
                    'json_trade_mark' => $getTradeMark,
                    'json_search' => $result,
                    'json_group_search' => $getGroupSearch,
                ]);
            } else {
                $this->view('Home', [
                    'page' => $page,
                    'json_trade_mark' => $getTradeMark,
                    'json_search' => $result,
                    'json_group_search' => $getGroupSearch
                ]);
            }
        } else {
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
    }
}
