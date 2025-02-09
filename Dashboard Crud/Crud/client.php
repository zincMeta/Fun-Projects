<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-5">
        
        <h2>List of clients</h2>
        <a id="new"class=" btn btn-primary" href="create.php" role="button">new client</a>
        <a id="new"class=" btn btn-primary" href="../Login.php" role="button">log-out</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

            <?php
            

                $servername ='localhost';
                $username ='root';
                $password ='';
                $database ='CRUD';

                $conn = new mysqli($servername,$username,$password,$database);

                if($conn->connect_error){
                    die("connection failed") . $conn->connect_error;
                }

                $sql = "SELECT * FROM client";

                $result =$conn->query($sql);

                if(!$result){
                    die("invade query" . $conn->error);
                }

                while($row = $result->fetch_assoc()){

                    echo "
                        
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>

                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>

                    ";
                }


            ?>

            </tbody>

        </table>

    </div>
    
</body>
</html>