<?php

if(isset($_GET['id']) ){
    $id= $_GET['id'];

    // connecting to your databases
    $servername ='localhost';
    $username ='root';
    $password ='';
    $database ='CRUD';

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM client WHERE id='$id'";
    $conn->query($sql);

}

header("location:client.php");
exit;

?>