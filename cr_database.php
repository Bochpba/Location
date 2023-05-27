<?php
include "conexaodatabase.php";
$sql = "CREATE DATABASE locacao";

if (mysqli_query($conn, $sql)) {
    echo "Banco de dados criado com sucesso";
} else {
    echo "Erro ao criar banco de dados" + mysqli_error($conn);
}
mysqli_close($conn);
?>