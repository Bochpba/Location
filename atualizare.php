<?php
include_once("conexao.php");

$idup = $_GET['atu'];
$nameup = $_GET['name'];
$marca = $_GET['marca'];
$modelo = $_GET['modelo'];
$cor = $_GET['cor'];

$update = "UPDATE equipamento SET equip = '$nameup', marca = '$marca', modelo = '$modelo', cor = '$cor' WHERE id_equip = $idup";
mysqli_query($conn, $update);

header('Location: ' . "tb_equipamento.php");
?>