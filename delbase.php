<?php
include_once("conexao.php");

$delbase = "DROP DATABASE locacao";

if ($conn->query($delbase) === TRUE) {
    echo "Database deletado.";
} else {
    echo "Erro ao deletar batabase: " . mysqli_error($conn);
}
?>