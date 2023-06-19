<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="tabela.css">
  <title>Document</title>
</head>

<body>
  <?php
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
<div class="container">
<div class="box3">
      <div class="box">
<?php
  if ($_SESSION['alt'] == 1) {
    echo "<a href='tb_equipamento.php?data=$_SESSION[data]'> <img src='voltar.png' width='50px'> </a>";
  } else {
    echo "<a href='busca_equipamento.php?atu=$_SESSION[equip]'> <img src='voltar.png' width='50px'> </a>";
  }
  ?>
  </div>
 <div class="box1">
        <div class="table">
  <form action="atualizare.php" method="get" align="center">
    <br> <br>
    <input type="text" name="name" value="<?php echo "$nome" ?>" placeholder="nome do equipamento">
    <br> <br>
    <input type="text" name="marca" value="<?php echo "$marca" ?>" placeholder="marca do equipamento">
    <br> <br>
    <input type="text" name="modelo" value="<?php echo "$modelo" ?>" placeholder="modelo do equipamento">
    <br> <br>
    <input type="text" name="cor" value="<?php echo "$cor" ?>" placeholder="cor do equipamento">
    <br> <br>
    <input type="hidden" name="atu" value="<?php echo "$idup"; ?>" >
    <input type="submit" value="ATUALIZAR">
    <?php


    ?>
  </form>
  </div>
      </div>
    </div>
  </div>
</body>

</html>