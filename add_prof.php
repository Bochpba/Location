<?php
include "conexao.php";
session_start();

$nome = $_GET['nome'];
$aula = $_GET['aula'];
$position = $_GET['position'];
$data = $_SESSION['data'];

$sqlp = "SELECT * FROM equipamento";
$resultp = mysqli_query($conn, $sqlp);


if ($nome != "") {
   $sql = "INSERT INTO professores (nome, aula, position, datae) VALUES ('$nome', '$aula', '$position', '$data')";
   if (mysqli_query($conn, $sql)) {
      echo "Informações armazenadas com sucesso" . "<br>";
      header('Location: ' . "tb_professores.php");
   } else {
      echo 'erro';
   }
} else {
   $_SESSION['mesg'] = true;
   header('Location: ' . "tb_professores.php");
}
mysqli_close($conn);
?>