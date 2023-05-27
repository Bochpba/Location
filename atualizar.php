<?php
include_once("conexao.php");

$idup = $_GET['atu'];
$nameup = $_GET['name'];
$aula = $_GET['aula'];
$position = $_GET['position'];

$update = "UPDATE professores SET nome = '$nameup', aula = '$aula', position = '$position' WHERE id_prof = $idup";
mysqli_query($conn, $update);

header('Location: ' . "tb_professores.php");
?>