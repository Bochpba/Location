<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="tabela.css">
<?php
include "conexao.php";


session_start();

include "pass.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="box3">
        <div class="box"><a href="locacaoprof.php?data=<?php echo $_SESSION['data'] ?>"> <img src="voltar.png" width="50px"> </a> </div>
        <div class="table"> 
    <h1> Consulta equipamento por nome </h1>
    <form method="GET" action="busca_accprof.php">
        <input id="keyword" name="equip" type="text">
        <button type="submit" id="search">procurar </button>
    </form>
    </div>
</div>
</div>
</body>

</html>