<?php
require_once "./app/modelo/Nota.php";

$notes = Nota::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/vistas/recursos/reglas.css">
    <title>HOME</title>
</head>

<body>
    <?php
    require "recursos/navbar.php";
    ?>
    <div class="notes-container">
        <?php

        foreach ($notes as $note) {
        ?>
            <a href="?view=view&id=<?php echo $note->getUUID(); ?>">
                <div class="note-preview">
                    <div class="title">
                        <?php
                        echo $note->getTitle();
                        ?>
                    </div>
                </div>
            </a>
        <?php
        }

        ?>
    </div>

</body>

</html>