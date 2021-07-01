<?php
class Controller{
    public function model($nameModel){
        require_once "../SusuSneaker/mvc/models/".$nameModel.".php";
        return new $nameModel;
    }

    public function view($view, $data=[]){
        require_once "../SusuSneaker/mvc/views/".$view.".php";
    }

    public function view_block($view, $data=[]){
        require_once "../SusuSneaker/mvc/views/blocks/".$view.".php";
    }
}

?>