<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";

$conn = mysqli_connect($servidor, $usuario, $senha);

if (!$conn) {
    die("falha na conexao" + mysqli_connect_error());
}

?>