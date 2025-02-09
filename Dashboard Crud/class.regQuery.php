<?php

class register{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "SIGNUP";


    public function __construct($username, $password){
        $this->Name=$username;
        $this->Password=$password;

        $this->Register();

    }

    private function Register(){

        $this->conn =new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        $this->sql ="INSERT INTO Login(NAME,PASSWORD) VALUES ('$this->Name','$this->Password')";


        $this->result = $this->conn->query($this->sql);


        if($this->result === TRUE){
            echo "record add successfully <a href='Login.php'>Log in</a>";
        }else{
            echo "unable to add records" ;
        }
    }

}



?>