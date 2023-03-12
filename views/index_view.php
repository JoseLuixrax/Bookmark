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
    <h2>Busqueda de Bookmarks</h2>
    <form action="" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del Bookmarks">
        <input type="submit" value="Buscar Bookmarks" name="buscarbookmarks">
    </form>
    <h3>Lista de Bookmarks</h2>
    <?php
    // var_dump($data);
    foreach ($data as $key => $value) {
        // var_dump($value);
        echo "<span>Descripción: ". $value['descripcion'] . "</span> <br>
        <span>URL: <a href='". $value['bm_url'] . "'>". $value['bm_url'] ."</a></span> <br>
        <a href='/bookmarks/edit/".$value["id"]."'>Edit</a>
        <a href='/bookmarks/delete/".$value["id"]."'>Delete</a> <br><br>";
        
    }
    ?>
    <a href="/bookmarks/add"><button>Añadir Bookmarks</button></a>

    <br>
    <a href="/logout">Logout</a>
</body>
</html>