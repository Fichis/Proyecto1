<?php
require_once "./app/modelo/Nota.php";

if (count($_POST) > 0 && $_POST["accion"]) {
    //compruebo que accion es la que elige el usuario
    $accion = $_POST["accion"];
    //actualizar nota
    if ($accion == "Actualizar nota") {
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $content = isset($_POST["content"]) ? $_POST["content"] : "";
        $uuid = $_POST["id"];

        $note = Nota::get($uuid);
        $note->setTitle($title);
        $note->setContent($content);

        $note->update();
        header("Location: http://localhost/dweb/Proyecto1/?view=home");
    }else if($accion == "Borrar nota"){
        $uuid = $_POST["id"];

        $note = Nota::get($uuid);
        $note->delete();
        header("Location: http://localhost/dweb/Proyecto1/?view=home");
    }
} else if (isset($_GET["id"])) {
    $note = Nota::get($_GET["id"]);
} else {
    header("Location: http://localhost/dweb/Proyecto1/?view=home");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/vistas/recursos/reglas.css">
    <title>Vista</title>
</head>

<body>
    <?php
    require "recursos/navbar.php";
    ?>
    <form action="?view=view&id=<?php echo $note->getUUID(); ?>" method="POST">
        <input type="text" name="title" placeholder="Introduce un titulo..." value="<?php echo $note->getTitle(); ?>">
        <input type="hidden" name="id" value="<?php echo $note->getUUID(); ?>">
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $note->getContent(); ?></textarea>
        <input type="submit" name="accion" value="Actualizar nota">
        <input id="delete" type="submit" name="accion" value="Borrar nota">
    </form>
</body>

</html>