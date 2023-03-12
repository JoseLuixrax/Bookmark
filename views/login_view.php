<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jose Luis Pérez Lara">
    <title>Document</title>
</head>
<body>
    <h1>Bookmarks</h1>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" value="Login">
    </form>
    <span><?php $data["message"]?></span>
</body>
</html>