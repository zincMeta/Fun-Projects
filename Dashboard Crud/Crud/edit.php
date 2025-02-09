<?php

// connecting to your databases
$servername ='localhost';
$username ='root';
$password ='';
$database ='CRUD';

$conn = new mysqli($servername, $username, $password, $database);



        $id="";
        $name="";
        $email="";
        $phone="";
        $address="";

        $errorMessage="";
        $successMessage="";

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // Get Method: show the data of the client
            if(!isset($_GET["id"]) ){
                header("localtion:client.php");
                exit;
            }

            $id=$_GET["id"];

            $sql ="SELECT * FROM client WHERE id='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if(!$row){
                header("location:client.php");
                exit; 
            }

            $name=$row["name"];
            $email=$row["email"];
            $phone=$row["phone"];
            $address=$row["address"];

        }else{
            //POST method: Update the data of the client

            $ID=$_POST['id'];
            $NAME=$_POST['NAME'];
            $EMAIL=$_POST['EMAIL'];
            $PHONE=$_POST['PHONE'];
            $ADDRESS=$_POST['ADDRESS'];

        do{
            if( empty($ID) || empty($NAME) || empty($EMAIL) || empty($PHONE) || empty($ADDRESS) ){
                $errorMessage = "All the fields are required, please click on the back button and try again";
                break;
            }

            $sql = "UPDATE client SET name='$NAME', email='$EMAIL', phone='$PHONE', address='$ADDRESS' WHERE id='$ID'";
            $Result = $conn->query($sql);

            $successMessage = "client add succesfully";

            header("location:client.php");
            exit; 

        }while(true);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <?php
            if(!empty($errorMessage)){
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button'class='btn-close' data-bs-dismiss='alert' arial-lable='close'></button>
                    </div>
                ";
            }
        ?>

        <h2>Edit Client</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Name</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="NAME" value="<?php echo $name;?>"/> 
                 </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Email</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="EMAIL" value="<?php echo $email;?>"/>
               </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-from-lable">Phone</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="PHONE" value="<?php echo $phone;?>"/>
               </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Address</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ADDRESS" value="<?php echo $address;?>"/>
               </div>
            </div>

            <?php
                if (!empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                 <button type='button'class='btn-close' data-bs-dismiss='alert' arial-lable='close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="client.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    
</body>
</html>