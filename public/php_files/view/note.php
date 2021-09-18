<?php
include_once '../models/Notas.php';
$id = $_GET['id'];
$note = new Nota();
$note->setId($id);
$noteProperties = $note->showOneNote();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../assets/styles.css">
        <title><?php echo $noteProperties['titulo'];?></title>
    </head>
    <body>
            <div class="nota">
                <div class="centrado">
                    <h1 class="cover-heading"><?php echo $noteProperties['titulo'];?></h1><br>
                    <p class="lead"><?php echo $noteProperties['nota'];?></p><br>
                    <p class="lead">
                        <a href="#" class="btn btn-lg btn-secondary"><?php echo $noteProperties['creada'];?></a>
                    </p>
                </div>
            </div>
    </body>
</html>
