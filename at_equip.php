<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
   include "pass.php";
   
  include("conexao.php");
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

  $idup = $_GET['atu'];

  $sql = "SELECT * FROM equipamento WHERE id_equip = '$idup'";
  $result = mysqli_query($conn, $sql);

  if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {
      $id_equip = $row["id_equip"];
      $nome = $row["equip"];
      $marca = $row["marca"];
      $modelo = $row["modelo"];
      $cor = $row["cor"];
    }
  }

  ?>
    <a href="tb_equipamento.php?data=<?php echo $_SESSION['data'] ?>"> voltar </a>
  <form action="atualizare.php" method="get" align="center">
    <label> Insira o novo equipamento :</label>
    <input type="text" name="name" value="<?php echo "$nome" ?>">
    <br>
    <label> Insira a marca :</label>
    <input type="text" name="marca" value="<?php echo "$marca" ?>">
    <br>
    <label> Insira o modelo :</label>
    <input type="text" name="modelo" value="<?php echo "$modelo" ?>">
    <br>
    <label> Insira a cor :</label>
    <input type="text" name="cor" value="<?php echo "$cor" ?>">
    <br>
    <input type="hidden" name="atu" value="<?php echo "$idup"; ?>">
    <input type="submit" value="ATUALIZAR">
    <?php


    ?>
  </form>

</body>

</html>