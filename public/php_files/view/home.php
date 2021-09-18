<?php
include_once '../models/Notas.php';
include_once '../models/User.php';
session_start();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Bienvenido <?php echo $_SESSION['nombre']; ?> te presentamos tus notas</h1>
        <button class="btn btn-secondary"><a class="badge badge-secondary" href="../controllers/Functions.php">Cerrar
                Sesión</a></button>
        </h1>
    </div>
</section>

<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <section class="inset_note">

                    <div id="add_note_form ">
                        <h2 class="text-primary">Agrega una nota nueva!</h2>
                        <form method="post" action="../controllers/Controller.php">
                            <div class="form-control ">
                                <label>Titulo de la nota</label> <br>
                                <input name="titulo" type="text" class="fomr-control" placeholder="Titulo" required>
                                <br>
                                <label>Nota</label><br>
                                <textarea name="nota"></textarea><br>
                                <input name="add" value="1" type="hidden">
                                <input type="submit" value="Agregar Nota" class="btn btn-primary mt-1">
                            </div>
                        </form>
                    </div>
                </section>
                <?php
                $note = new Nota();
                $note->setIdUsuario($_SESSION['id']);
                $notesForUser = $note->showAllNotes();
                while ($note = $notesForUser->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 box-shadow">
                        <h3 class="text-success"><?php echo $note['titulo']; ?></h3>
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <p class="card-text"><?php echo $note['nota']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Creada el: <?php echo $note['creada']; ?></small>

                                    <div class="btn-group">
                                        <button class="btn btn-success btn-sm"><a class="badge badge-success"
                                                                                  href="note.php?id=<?php echo $note['id']; ?>">Consultar</a>
                                        </button>
                                        <button class="btn btn-warning btn-sm"><a class="badge badge-warning"
                                                                                  href="edit.php?id=<?php echo $note['id']; ?>">Editar</a>
                                        </button>
                                        <button class="btn btn-danger btn-sm"><a class="badge badge-danger"
                                                                                 href="../controllers/Controller.php?id=<?php echo $note['id']; ?>">Eliminar</a>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

    </div>
    </div>

</main>
</body>
</html>