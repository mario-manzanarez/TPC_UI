<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <input type="hidden" name="login" value="1">
</head>
<body class="text-center">
<div class="container border">
    <div class="row justify-content-center ">
        <form class="form-group" method="post" action="controllers/Controller.php">
            <h1 class="h3 mb-3 mt-3 font-weight-normal">Por favor ingrese su usuario y contraseña</h1>
            <div class="form-control">
                <label for="inputEmail">Usuario</label>
                <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Usuario" required="" autofocus="">
            </div>
            <div class="form-control">
                <label for="inputPassword" >Contraseña</label>
                <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
            </div>

            <input type="hidden" name="login" value="1">
            <div class="checkbox mb-3">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">Topicos selectos de programación Web</p>
        </form>
    </div>


</div>


</body>
</html>

