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

  $sql = "SELECT * FROM professores  INNER JOIN equipamento ON equipamento.id_equip = professores.position WHERE id_prof = '$idup'";
  $result = mysqli_query($conn, $sql);

  $sqlp = "SELECT * FROM equipamento";
  $resultp = mysqli_query($conn, $sqlp);

    while ($row = mysqli_fetch_assoc($result)) {
      $id_prof = $row["id_prof"];
      $nome = $row["nome"];
      $equip = $row["equip"];
      $aula = $row['aula'];
    }
  ?>
  <a href="tb_professores.php?data=<?php echo $_SESSION['data'] ?>"> voltar </a>
  <br>
  <form action="atualizar.php" method="get" align="center">
    <label> Insira o novo nome :</label>
    <input type="text" name="name" value=<?php echo "$nome" ?>>
    <br>
    <label> Insira o equipamento :</label>
    <select name="position">
    <option value="" disabled selected><?php echo $equip ?></option>
      <?php
      while ($rowp = mysqli_fetch_array($resultp)) { ?>
        <option value="<?php echo $rowp["id_equip"]; ?>"><?php echo $rowp["equip"]; ?></option>
        <?php
      }
      ?>
    </select>
    <br>
    <label> Insira a aula :</label>
    <select name="aula">
    <option value="" disabled selected>Aula <?php echo $aula ?></option>
      <option value=1>Aula 1</option>
      <option value=2>Aula 2</option>
      <option value=3>Aula 3</option>
      <option value=4>Aula 4</option>
      <option value=5>Aula 5</option>
      <option value=6>Aula 6</option>
      <option value=7>Aula 7</option>
      <option value=8>Aula 8</option>
      <option value=9>Aula 9</option>
    </select>
    <br>
    <input type="hidden" name="atu" value="<?php echo "$idup"; ?>">
    <br>
    <input type="submit" value="ATUALIZAR">
    <?php

    ?>
  </form>

</body>

</html>