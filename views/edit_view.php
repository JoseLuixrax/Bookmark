<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pokemons Editar</title>
</head>
<body>
    <h1>Pokemons</h1>
    <h2>Añadir equipos</h2>
    <form action="" method="POST">
        <label>Descripción: </label>
        <input type="text" name="descripcion" value="<?php echo $data["descripcion"]?>">
        <br>
        <br>
        <label>URL: </label>
        <input type="text" name="url" value="<?php echo $data["bm_url"]?>">
        <br>
        <br>
        <input type="submit" value="Modificar Bookmark" name="editBM">
    </form>

    <br>
    <a href="/">Cancelar</a>
</body>
</html>