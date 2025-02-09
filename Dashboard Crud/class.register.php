<?php

class regis{

public function __construct(){
 $this->register();
}

public function register(){
    ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form action="regPage.php" method="post" require_once>
        <h1>Register</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="pass" id="password" required>
        </div>
        <section>
            <button type="submit">submit</button>
            <a href="Login.php">Login</a>
        </section>
    </form>
</main>
</body>
</html>

<?php
}

}
?>