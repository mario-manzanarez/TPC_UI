<?php
include_once "../models/User.php";
include_once "../models/Notas.php";


if (isset($_POST['login']) == 1) {

    $usuario = $_POST['user'];
    $pass = $_POST['pass'];
    $usr = new User();
    $bool = $usr->login($usuario, $pass);
    $redirect = $bool ? "../view/home.php" : "../index.php";
    header('Location: ' . $redirect);

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $note = new Nota();
    $note->setId($id);
    $bool = $note->deleteNote();
    if ($bool) {
        header('Location: ../view/home.php');
    } else {
        echo "No se ha podido eliminar la nota";
    }
}

if (isset($_POST['add']) == 1) {
    session_start();
    define("id_usuario",$_SESSION['id']);
    $note = new Nota();
    $note->setTitulo($_POST['titulo']);
    $note->setNota($_POST['nota']);
    $note->setIdUsuario(id_usuario);

    $bool = $note->addNote();
    if ($bool) {
        header('Location: ../view/home.php');
    } else {
        echo "No se ha podido agregar la nota";
    }
}

if(isset($_POST['edit'] )> 0){

    $note = new Nota();
    $note->setId($_POST['edit']);
    $note->setTitulo($_POST['titulo']);
    $note->setNota($_POST['nota']);
    $bool = $note->editNote();
    if ($bool){
        header('Location: ../view/home.php');
    }else{
        echo "No se ha podido editar la nota";
    }

}


?>