<?php


class Login {

    
private $dbhost = "localhost";
private $dbuser = "root";
private $dbpass = "";
private $db = "SIGNUP";


public function __construct($username, $password){
    $this->user=$username;
    $this->pass=$password;
    $this->login();

}
private function login(){

    

$this->conn =mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->db);

$this->sql="SELECT NAME, PASSWORD FROM Login where NAME='$this->user' AND PASSWORD='$this->pass'";
$this->result= $this->conn->query($this->sql);

if($this->result->num_rows > 0 ){

header("location:Crud/client.php");

}else{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- custom css file links -->

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1 class="header"><span style="color:crimson">Login unsuccessful</span> please try again</h1>

    
</body>
</html>
<?php
}
}

}

?>