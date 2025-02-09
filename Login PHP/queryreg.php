<?php

define('serverName','localhost');
define('userName','root');
define('passWord','');
define('dbName','log');

$connection = mysqli_connect(serverName,userName,passWord,dbName);

if($connection->connect_error){
    die('connection failed') . $connection->connect_error;
}else{
    print "connection successful";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
   $username = $_POST['username'];
   $password = $_POST['password'];

    $sql = "INSERT INTO sign(NAME,PASSWORD) VALUES('$username','$password')";

    $result = $connection->query($sql);

    if($result === FALSE){

        echo "<script>alert('fail to insert')</script>";

    }else{
        
        echo "<script>alert('inserted successful')</script>";
        echo "<br><br>". $username . "<span> </span>" . $password .  "<span> </span>" . "was inserted successfully";
        echo "<a href='login.php'> log in </a>";

    }

    }
}

?>