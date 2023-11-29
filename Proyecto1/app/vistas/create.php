<?php

require_once "./app/modelo/Nota.php";

if (count($_POST) > 0) {
    $title = isset($_POST["title"]) ? $_POST["title"] : "title de prueba";
    $content = isset($_POST["content"]) ? $_POST["content"] : "contenido de prueba";

    $note = new Nota($title, $content);
    $note->save();
    header("Location: http://localhost/dweb/Proyecto1/?view=home");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/vistas/recursos/reglas.css">
    <title>Create new Note</title>
</head>

<body>
    <?php
    require "recursos/navbar.php";
    ?>
    <form action="?view=create" method="POST">
        <input type="text" name="title" placeholder="Introduce un titulo...">
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <input id="create" type="submit" value="Crear nota">
    </form>
</body>

</html>