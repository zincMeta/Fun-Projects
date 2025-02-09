<?php

require('class.logQuery.php');


$user =$_POST['username'];
$pass =$_POST['password'];


$content = new Login($user,$pass);

?>