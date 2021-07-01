<?php

class Admin extends Controller
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
        if (isset($_SESSION['userName']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $getLargeGroup = json_decode($this->ItemsModel->getLargeGroup());
            $getGroupItems = json_decode($this->ItemsModel->getGroup());
            $getGroup = json_decode($this->ItemsModel->getGroup());

            $getGroup = json_decode($this->ItemsModel->getGroup());
            $page = 'admin';
            $title = 'Admintrasion';

            //
            if (isset($_SESSION['userName'])) {

                if ($_SESSION['idGroup'] == 2) { //view for customer
                    echo "
                        <script>
                            window.location = '../../../../SusuSneaker/Home/SayHi';
                        </script>
                    ";
                } else if ($_SESSION['idGroup'] == 1) { // view for employee
                    $infoUserEmployee = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
                    $header = 'header_employee';
                    $infoUser = $infoUserEmployee;
                } else {
                    //admin
                }
            } else {
                echo "
                        <script>
                            window.location = '../../../../SusuSneaker/Home/SayHi';
                        </script>
                    ";
            }

            if ($_SESSION['idGroup'] == 2) { //Customer
                echo "
                    <script>
                        window.location = '../../../../SusuSneaker/Home/SayHi';
                    </script>
                ";
            } else if ($_SESSION['idGroup'] == 1) { // view for employee
                $infoUser = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
                $getItems = json_decode($this->ItemsModel->getItemsEdit());
                $getFullSize = json_decode($this->ItemsModel->getFullSize());
                $getInfoCustomer = json_decode($this->UserModel->getInfoCustomerAdmin());
                $getFullOrder = json_decode($this->ItemsModel->getAllOrderAdmin());
                $this->view('Admin', [
                    'title' => $title,
                    'json_infoUser' => $infoUser,
                    'addEmployee' => 'admin-notAccess',
                    'editEmployee' => 'admin-notAccess',
                    'getLargeGroup' => $getLargeGroup,
                    'getGroupItems' => $getGroupItems,
                    'json_group' => $getGroup,
                    'item_edit' => $getItems,
                    'full_size' => $getFullSize,
                    'full_customer' => $getInfoCustomer,
                    'full-order' => $getFullOrder
                ]);
            } else {
                $infoUser = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
                $getItems = json_decode($this->ItemsModel->getItemsEdit());
                $getFullSize = json_decode($this->ItemsModel->getFullSize());
                $getInfoCustomer = json_decode($this->UserModel->getInfoCustomerAdmin());
                $getInfoEmployee = json_decode($this->UserModel->getInfoEmployeeAdmin());
                $getFullOrder = json_decode($this->ItemsModel->getAllOrderAdmin());
                $this->view('Admin', [
                    'title' => $title,
                    'json_infoUser' => $infoUser,
                    'addEmployee' => 'admin-addEmployee',
                    'editEmployee' => 'admin-editEmployee',
                    'getLargeGroup' => $getLargeGroup,
                    'getGroupItems' => $getGroupItems,
                    'json_group' => $getGroup,
                    'item_edit' => $getItems,
                    'full_size' => $getFullSize,
                    'full_customer' => $getInfoCustomer,
                    'full_employee' => $getInfoEmployee,
                    'full-order' => $getFullOrder
                ]);
            }
        } else {
            echo "
                        <script>
                            window.location = '../../../../SusuSneaker/Home/SayHi';
                        </script>
                    ";
        }
    }

    // public function admin_new()
    // {
    //     if (isset($_SESSION['userName']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         $getLargeGroup = json_decode($this->ItemsModel->getLargeGroup());
    //         $getGroupItems = json_decode($this->ItemsModel->getGroup());
    //         $getGroup = json_decode($this->ItemsModel->getGroup());

    //         $getGroup = json_decode($this->ItemsModel->getGroup());
    //         $page = 'admin';
    //         $title = 'Admintrasion';

    //         //
    //         if (isset($_SESSION['userName'])) {

    //             if ($_SESSION['idGroup'] == 2) { //view for customer
    //                 echo "
    //                     <script>
    //                         window.location = '../../../../SusuSneaker/Home/SayHi';
    //                     </script>
    //                 ";
    //             } else if ($_SESSION['idGroup'] == 1) { // view for employee
    //                 $infoUserEmployee = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
    //                 $header = 'header_employee';
    //                 $infoUser = $infoUserEmployee;
    //             } else {
    //                 //admin
    //             }
    //         } else {
    //             echo "
    //                     <script>
    //                         window.location = '../../../../SusuSneaker/Home/SayHi';
    //                     </script>
    //                 ";
    //         }
    //         if ($_SESSION['idGroup'] == 2) { //Customer
    //             echo "
    //                 <script>
    //                     window.location = '../../../../SusuSneaker/Home/SayHi';
    //                 </script>
    //             ";
    //         } else if ($_SESSION['idGroup'] == 1) { // view for employee
    //             $infoUser = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
    //             $getItems = json_decode($this->ItemsModel->getItemsEdit());
    //             $getFullSize = json_decode($this->ItemsModel->getFullSize());
    //             $getFullOrder = json_decode($this->ItemsModel->getAllOrderAdmin());

    //             $this->view('Admin', [
    //                 'title' => $title,
    //                 'json_infoUser' => $infoUser,
    //                 'addEmployee' => 'admin-notAccess',
    //                 'editEmployee' => 'admin-notAccess',
    //                 'getLargeGroup' => $getLargeGroup,
    //                 'getGroupItems' => $getGroupItems,
    //                 'json_group' => $getGroup,
    //                 'item_edit' => $getItems,
    //                 'full_size' => $getFullSize,
    //                 'full-order' => $getFullOrder
    //             ]);
    //         } else {
    //             $infoUser = json_decode($this->UserModel->getInfoEmployee($_SESSION['idUser']));
    //             $getItems = json_decode($this->ItemsModel->getItemsEdit());
    //             $getFullSize = json_decode($this->ItemsModel->getFullSize());
    //             $getFullOrder = json_decode($this->ItemsModel->getAllOrderAdmin());
    //             $this->view('Admin', [
    //                 'title' => $title,
    //                 'json_infoUser' => $infoUser,
    //                 'addEmployee' => 'admin-addEmployee',
    //                 'editEmployee' => 'admin-editEmployee',
    //                 'getLargeGroup' => $getLargeGroup,
    //                 'getGroupItems' => $getGroupItems,
    //                 'json_group' => $getGroup,
    //                 'item_edit' => $getItems,
    //                 'full_size' => $getFullSize,
    //                 'full-order' => $getFullOrder
    //             ]);
    //         }
    //     } else {
    //         echo "
    //                     <script>
    //                         window.location = '../../../../SusuSneaker/Home/SayHi';
    //                     </script>
    //                 ";
    //     }
    // }

    
}
