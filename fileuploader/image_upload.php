<?php

define("ServerName","localhost");
define("UserName","root");
define("PassWord","");
define("DbName","image");

$connection = mysqli_connect(ServerName,UserName,PassWord,DbName);

if($connection-> connect_error){
    die("fail to connect to database" . $connection-> connect_error);
}else{
    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["Submit"])){

        $image_name=$_POST["image_name"];
        $pname = rand(1000,10000) . "-" . $_FILES['photos']['name'];
        $tname = $_FILES['photos']['tmp_name'];

        if($_FILES['photos']['error']==1){
            echo "unknown error";
            exit();
        }else{
        $upload_dir = "images";

        $validExtension = ['jpeg','png','jpg'];

        $imageExtension = explode('.',$pname);

        move_uploaded_file($tname, $upload_dir ."/". $pname );

        $sql ="INSERT INTO upload(IMAGE_NAME,PHOTO) VALUES('$image_name','$pname')";

        $Result = $connection->query($sql);

        if($Result){

            $query = "SELECT * FROM upload where PHOTO='$pname' ";

            $result = $connection->query($query);


            $rows = $result->fetch_assoc();

            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>IMAGE</title>
                <link rel="stylesheet" href="image.css">
            </head>
            <body>
                <h1>IMAGE UPLOADS</h1>
                <div>
                    <p><?php echo $rows['IMAGE_NAME'] ?></p>
                    <img src="images/<?php echo $rows['PHOTO'] ?>" >
                </div>
            </body>
            </html>


            <?php

        }else{
            ?>

            <script> alert("failed to insert")</script>

            <?php
        }
    }

    }

  }   

}


?>