<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "tasty_burger";

if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
    //echo"Conectado";
} else {
    echo "Erro";
}
function mensage($texto, $tipomensage)
{
    echo "<div class='alert alert-$tipomensage' role='alert'>
        $texto
  </div>";
}
