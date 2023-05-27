<?php
include ("conexao.php");
session_start();

$login = $_POST['user'];
$senha = $_POST['senha'];
$logtype = $_POST['select'];

$sqlp = "INSERT INTO logim (logim, senha, logtype) VALUES ('$login', '$senha', '$logtype')";
if (mysqli_query($conn, $sqlp)) {
    $_SESSION['yes'] = true;
    header('Location: new_user.php');
} else {
    $_SESSION['no'] = true;
    header('Location: new_user.php');
}
mysqli_close($conn);
?>