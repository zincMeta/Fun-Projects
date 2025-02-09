<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload image page</title>
</head>
<body>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>title</label>
        <input type="text" name="title">
        <label>File Upload</label>
        <input type="file" name="file">
        <input type="submit" name="submit">

    </form>

</body>
</html>