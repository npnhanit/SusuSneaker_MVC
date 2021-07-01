<?php
class App{

    protected $controller = "Home";
    protected $action = "SayHi";
    protected $params = [];

    function __construct(){
        $tempArr = $this->UrlProcess();
        // print_r($tempArr);
        if(!isset($tempArr[0])){
            $tempArr[0]="Home";
        }
        
        //controller
            if(file_exists("./mvc/controllers/".$tempArr[0].".php")){
                $this->controller = $tempArr[0];
                unset($tempArr[0]);
            }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        
        // Method
        if(isset($tempArr[1])){
            if(method_exists($this->controller, $tempArr[1])){
                $this->action = $tempArr[1];
                unset($tempArr[1]);
            }
        }

        // Params
        $this->params = $tempArr?array_values($tempArr):[];
        // echo(count($this->params));
        // if(count($this->params) > 2){
        //     $this->controller = "Home";
        //     require_once "./mvc/controllers/".$this->controller.".php";
        //     $this->controller = new $this->controller;
        //     $this->action = "SayHi";
        //     $this->params = [];
        // }
        // echo(count($this->params));
        call_user_func_array(array($this->controller, "$this->action"), $this->params);
        // if(call_user_func_array(array($this->controller, "$this->action"), $this->params)){
        // }else{
        //     $this->controller = "Home";
        //     $this->action = "SayHi";
        //     $this->params = [];
        //     call_user_func_array(array($this->controller, "$this->action"), $this->params);
        // }
    }

    function UrlProcess(){
        if(isset($_GET["url"])){
            $temp = $_GET['url'];
            return $arr = explode("/", filter_var(trim($temp, "/")));
        }

        
    }

}

?>