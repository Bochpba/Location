<!DOCTYPE html>
<html lang="en">
<?php
include "conexao.php";
session_start();

$sqli = "SELECT * FROM logim";
$pass = mysqli_query($conn, $sqli);

$found = false;
while ($logar = mysqli_fetch_assoc($pass)) {
    if ($_SESSION['vald'] == $logar['logim']) {
        $found = true;
        break;
    }
}
if (!$found) {
    header("location: index0.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="locacao.php?data=<?php echo $_SESSION['data'] ?>"> voltar </a>
    <h1> Consulta professor por nome </h1>
    <form method="GET" action="busca_professor.php">
        <input id="keyword" name="nome" type="text" />
        <button type="submit" id="search">procurar </button>
    </form>
</body>

</html>