<?php
include_once("conexao.php");
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];
$_SESSION['bool'] = false;

$sql = "SELECT * FROM logim WHERE logim = '$login' and senha = '$senha'";
$result = mysqli_query($conn, $sql);
$logar = mysqli_fetch_assoc($result);

if ($logar) {
    $_SESSION['vald'] = $logar['logim'];
    if ($logar['logtype'] == true) {
        header('Location: locacao.php?data=');
    } else {
        header('Location: locacaoprof.php?data=');
    }
} else {
    header('Location: index.php');
    $_SESSION['bool'] = true;
    $_SESSION['vald'] = 0;
}
?>
