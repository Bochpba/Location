<?php
include "conexao.php";
session_start();


$equip = $_GET['equip'];
$marca = $_GET['marca'];
$modelo = $_GET['modelo'];
$cor = $_GET['cor'];

if ($equip != "") {
    $sql = "INSERT INTO equipamento (equip, marca, modelo, cor) VALUES ('$equip', '$marca', '$modelo', '$cor')";
    if (mysqli_query($conn, $sql)) {
        echo "Informações armazenadas com sucesso" . "<br>";
        header('Location: ' . "tb_equipamento.php");
    } else {
        echo 'erro';
    }
    mysqli_close($conn);
} else {
    $_SESSION['msg'] = true;
    header('Location: ' . "tb_equipamento.php");
}
?>