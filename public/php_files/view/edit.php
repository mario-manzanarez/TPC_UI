<?php
include_once "../models/Notas.php";
define("id",$_GET['id']);
$note = new Nota();
$note->setId(id);
$noteEdit =  $note->showOneNote();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar: <?php echo $noteEdit['titulo']?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container border">
            <div class="row justify-content-center ">
                <form class="form-group" method="post" action="../controllers/Controller.php"">
                    <h1 class="h3 mb-3 mt-3 font-weight-normal">Edita tus notas!</h1>
                    <div class="form-control">
                        <label>Titulo</label>
                        <input name="titulo" type="text" class="form-control" value="<?php echo $noteEdit['titulo']; ?>"> <br>

                    </div>
                    <div class="form-control">
                        <label>Nota</label>
                        <textarea name="nota" class="form-control" cols="50" rows="10"><?php echo $noteEdit['nota'];?></textarea> <br>
                    </div>

                    <input type="hidden" name="login" value="1">
                    <div class="checkbox mb-3">
                    </div>
                <input type="hidden" name="edit" value="<?php echo id?>">
                <input type="submit" class="btn btn-warning" value="Editar Nota">

                </form>
            </div>
        </div>
    </body>
</html>

