<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>

    <form action="queryreg.php" method="post">
        <h1>Register</h1>
        <label for="name">NAME</label>
            <input type="text" name="username"> 
        <label for="password">PASSWORD</label>
            <input type="text" name="password">
        <button type="submit">Submit</button>
    </form>
    
</body>
</html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>register</title>
</head>
<body>
<main>
    <h1 class="head">Welcome to the register page</h1>
    <form action="queryreg.php" method="post" class="transparent">
        <h1 class="login">register</h1>
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
            <a href="login.php">login</a>
        </section>
    </form>
</main>
</body>
</html>
