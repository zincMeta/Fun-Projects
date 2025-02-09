<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <h1 class="head">Welcome to the login page</h1>
    <h2>Sign In to this demo login</h2>
    <form action="querylog.php" method="post" class="transparent">
        <h1 class="login">Login</h1>
        <div>
            <label class="lable" for="username">Username:</label>
            <input type="text" name="username" id="name">
        </div>
        <div>
            <label class="lable" for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit">submit</button>
            <a href="register.php">Register</a>
        </section>
    </form>
</main>
</body>
</html>
