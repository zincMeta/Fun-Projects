<?php

class connect{


    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "SIGNUP";




    public function construct(){
        // everything in here will render on the web browser

        $this->connection();

    }
    private function connection(){
        // this will keep your connection credentials secure
        $this->conn =new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($this->conn->connect_error){
            die("connection failed:" . $this->conn->connect_error);
        }else{
            echo "connect successful";
        }

    }
}

?>