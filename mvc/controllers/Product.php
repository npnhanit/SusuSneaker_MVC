<?php
class Product extends Controller
{

    public $UserModel;
    public $ItemsModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
        $this->ItemsModel = $this->model("ItemsModel");
    }

    public function Directory($Trademark)
    {
        $getGroupTrademark = json_decode($this->ItemsModel->getGroupFromNameTrademark($Trademark));
        if ($getGroupTrademark == false) {
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $getItemsTrademark = json_decode($this->ItemsModel->getItemsFromTrademark($Trademark));
        $getImage = json_decode($this->ItemsModel->getImageItems());
        $getGroup = json_decode($this->ItemsModel->getGroup());
        $title = strtoupper($Trademark);
        $page = 'directory';
        //

        if (isset($_SESSION['userName'])) {
            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if ($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
                    </script>
                ";
            } else {
                // admintration
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

            $infoUserEmployee = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
            $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
            $this->view('home', [
                'page' => $page,
                'title' => $title,
                'json_items_trademark' => $getItemsTrademark,
                'json_image' => $getImage,
                'json_group_trademark' => $getGroupTrademark,
                'json_group' => $getGroup
            ]);
        } else {
            $this->view('Home', [
                'page' => $page,
                'title' => $title,
                'json_items_trademark' => $getItemsTrademark,
                'json_image' => $getImage,
                'json_group_trademark' => $getGroupTrademark,
                'json_group' => $getGroup
            ]);
        }
    }

    public function GroupItems($nameGroup)
    {
        $nameGroup = strtoupper($nameGroup);
        $getItemFromNameGroup = json_decode($this->ItemsModel->getItemsFromGroup($nameGroup));
        $getImage = json_decode($this->ItemsModel->getImageItems());

        $title = strtoupper($nameGroup);
        $page = 'groupItems';
        if ($getItemFromNameGroup === 'false') {
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }

        $getGroup = json_decode($this->ItemsModel->getGroup());

        if (isset($_SESSION['userName'])) {
            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if ($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
                    </script>
                ";
            } else {
                // admintration
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
            $this->view('home', [
                'page' => $page,
                'title' => $title,
                'json_items_group' => $getItemFromNameGroup,
                'json_image' => $getImage,
                'json_group' => $getGroup,
                'nameGroup' => $nameGroup
            ]);
        } else {
            $this->view('Home', [
                'page' => $page,
                'title' => $title,
                'json_items_group' => $getItemFromNameGroup,
                'json_image' => $getImage,
                'json_group' => $getGroup,
                'nameGroup' => $nameGroup
            ]);
        }
    }

    public function detail($mshh)
    {
        $getInfoItem = json_decode($this->ItemsModel->getInfoItem($mshh));
        $getImgItem = json_decode($this->ItemsModel->getImgItem($mshh));
        if ($getInfoItem === 'false' || $getImgItem === 'false') {
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $title = strtoupper($getInfoItem->TenHH[0]);
        $page = 'detail_item';
        $getGroup = json_decode($this->ItemsModel->getGroup());
        if (isset($_SESSION['userName'])) {

            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
                    </script>
                ";
            } else{
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
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
        $this->view('Home', [
            'page' => $page,
            'json_infoUser' => $infoUser,
            'infoItem' => $getInfoItem,
            'imgItem' => $getImgItem
        ]);
    }

    public function Cart()
    {
        $title = strtoupper("Giỏ Hàng");
        $page = 'cart';
        $getGroup = json_decode($this->ItemsModel->getGroup());
        if (isset($_SESSION['userName'])) {
            $getItemCart = json_decode($this->ItemsModel->getItemCart($_SESSION['idKH']));
            $getGroupCart = json_decode($this->ItemsModel->getGroupCart($_SESSION['idKH']));
            $getRemainMountItemCart = json_decode($this->ItemsModel->getRemainAmountItemCart($_SESSION['idKH']));
            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
                    </script>
                ";
            } else{
                // admin
            }
        } else {
            $header = 'header_visitors';
            $infoUser = '';
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $this->view_block('header', [
            'title' => $title,
            'json_infoUser' => $infoUser,
            'header_component' => $header,
            'json_group' => $getGroup
        ]);

        $this->view('home', [
            'page' => $page,
            'json_infoUser' => $infoUser,
            'json_itemCart' => $getItemCart,
            'json_groupCart' => $getGroupCart,
            'json_remainAmountItemCart' => $getRemainMountItemCart
        ]);
    }

    public function Pay()
    {
        $title = strtoupper("Thanh toán");
        $page = 'Pay';
        $getGroup = json_decode($this->ItemsModel->getGroup());
        if (isset($_SESSION['userName'])) {
            $getItemCart = json_decode($this->ItemsModel->getItemCart($_SESSION['idKH']));
            $getGroupCart = json_decode($this->ItemsModel->getGroupCart($_SESSION['idKH']));
            $getRemainMountItemCart = json_decode($this->ItemsModel->getRemainAmountItemCart($_SESSION['idKH']));

            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if($_SESSION['idGroup'] == 1) { // view for employee
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Admin/Admin_new';
                    </script>
                ";
            } else{
                // admin
            }
        } else {
            $header = 'header_visitors';
            $infoUser = '';
            echo "
                    <script>
                        window.location = '../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $this->view_block('header', [
            'title' => $title,
            'json_infoUser' => $infoUser,
            'header_component' => $header,
            'json_group' => $getGroup
        ]);

        $this->view('home', [
            'page' => $page,
            'json_infoUser' => $infoUser,
            'json_itemCart' => $getItemCart,
            'json_groupCart' => $getGroupCart,
            'json_remainAmountItemCart' => $getRemainMountItemCart
        ]);
    }

    public function User($action, $idUser)
    { //$action = Order, Info, Sale
        $arrayAction = ['Order', 'Info', 'Sale'];
        if (!(in_array($action, $arrayAction))) {
            echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $title = strtoupper("Đơn đặt hàng");
        $page = 'order';
        $idKH = $_SESSION['idKH'];
        $getGroup = json_decode($this->ItemsModel->getGroup());
        if (isset($_SESSION['userName'])) {
            $getAllOrder = json_decode($this->ItemsModel->getAllOrder($idKH));
            $getMSDH = json_decode($this->ItemsModel->getMSDH($idKH));
            if ($_SESSION['idGroup'] == 2) { //view for customer
                $infoUserCustomer = json_decode($this->UserModel->getInfoCustomer($_SESSION['idUser']));
                $header = 'header_customer';
                $infoUser = $infoUserCustomer;
            } else if($_SESSION['idGroup'] == 1) { // view for employee
                $infoUserEmployee = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
                 $header = 'header_employee';
                $infoUser = $infoUserEmployee;
            } else{
                // admin
            }
        } else {
            $header = 'header_visitors';
            $infoUser = '';
            echo "
                    <script>
                        window.location = '../../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
        }
        $this->view_block('header', [
            'title' => $title,
            'json_infoUser' => $infoUser,
            'header_component' => $header,
            'json_group' => $getGroup
        ]);

        $this->view('home', [
            'page' => $page,
            'json_infoUser' => $infoUser,
            'json_AllOrder' => $getAllOrder,
            'action' => $action,
            'json_MSDH' => $getMSDH
        ]);
    }
}
