<?php

$serverName ="localhost";
$userName ="root";
$passWord ="";
$dbName ="log";


$conn =new mysqli($serverName,$userName,$passWord,$dbName);

if($conn->connect_error){
    die("connection failed") . $conn->connect_error; 
    exit();
}else{

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM sign WHERE  NAME= ? AND PASSWORD= ?";

    $user =$_POST["username"];
    $pass =$_POST["password"];

    $stms =$conn->prepare($sql);
    $stms->bind_param("ss", $user,$pass );

    $stms->execute();

    $result = $stms->get_result();

    if($result-> num_rows > 0){
        
        if($row=$result->fetch_assoc()){
            ?><!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>HOME PAGE</title>
            <link rel="stylesheet" href="css/home.css">
            </head>
            <body>
       <div class="header">
            <h1>LOGIN SUCCESSFUL</h1>
            <br>
            <h1>Welcome

                <?php
                echo"
                <span style='background-color:#5938ae; color:#fff; padding:5px 20px; border-radius:8px;'>$row[NAME]</span>
                ";
                ?>

            </h1>
       </div>
            </html>
            </body>

            <?php
            }else{
            echo"failed";
        }
        }else{
        echo "<script>
                alert('Incorrect password or username');
              </script>";

        $reload = "<script>window.location.href='login.php';</script>";
        
        echo $reload;
       
     }
    }

    }

?>