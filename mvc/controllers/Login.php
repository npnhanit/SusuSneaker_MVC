<?php
class Login extends Controller
{

    public $UserModel;
    public $ItemsModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
        $this->ItemsModel = $this->model("ItemsModel");
    }

    public function SayHi(){
        $this->view('Login', [
        ]);
    }

    public function Register(){
        $this->view("Register", [
            
        ]);
    }
}