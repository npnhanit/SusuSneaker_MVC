<?php
class connDB{
    public $user_name = 'root';
    public $password = '';
    public $server = 'localhost';
    public $nameDB = 'website_sususneaker';
    public $conn;
    
    function __construct(){
        $this->conn = new mysqli($this->server, $this->user_name, $this->password, $this->nameDB);
    }
}

?>