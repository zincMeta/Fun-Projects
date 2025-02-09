<?php

$servername ='localhost';
$username ='root';
$password ='';
$database ='CRUD';

$conn = new mysqli($servername, $username, $password, $database);



$name="";
$email="";
$phone="";
$address="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $address=$_POST['Address'];

    do{
        if( empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "All the fields are required";
            break;
        }

        // add new client to database

        $sql = "INSERT INTO client(name,email,phone,address) VALUES ('$name','$email','$phone','$address')";
        $result = $conn->query($sql);
        
        if(!$result){
            $errorMessage = "invalid query" . $conn->error;
            break;
        }

        
        $name="";
        $email="";
        $phone="";
        $address="";

        $successMessage = "client add succesfully";
        
        header("location:client.php");
        exit;

    } while(false);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create client</title>
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

        <h2>New Client</h2>
        <form method="post">
            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Name</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $name;?>"/> 
                 </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Email</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $email;?>"/>
               </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-from-lable">Phone</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Phone" value="<?php echo $phone;?>"/>
               </div>
            </div>

            <div class="row mb-3">
                <lable class="col-sm-3 col-form-lable">Address</lable>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Address" value="<?php echo $address;?>"/>
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