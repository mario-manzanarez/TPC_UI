<?php
// Conexion a la base de datos
define("host", "localhost");
define("usuario", "pruebas");
define("bd", "TopicosWeb");
define("pass", "1234");
function conexion()
{
 return   mysqli_connect(host, usuario, pass, bd);
}


