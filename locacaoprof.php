<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="locacao.css" />
  <style>
    div {
      display: inline;
    }
  </style>
</head>

<body>
<div class="container">
    <div class="box3">
  <div class="navigation">
  
  <a href="consulta_accprof.php"> <button id="pesquisa">Consultar Equipamento Por Nome</button> </a>

  <a href="logout.php"> <button id="logoutp">Logout </button></a>
  </div>
  <?php
  include "conexao.php";
  include "arrays.php";

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
    header("location: logout.php");
  }
  $sqle = "SELECT * FROM equipamento";
  $result = mysqli_query($conn, $sqle);

  $sqlp = "SELECT * FROM professores ORDER BY aula, position";
  $resultp = mysqli_query($conn, $sqlp);
  ?>
  <div class="table" >
  <h1> <?php echo $_GET['data']?> </h1>

  <form method="GET" action="locacaoprof.php">
    <input type="date" value="<?php echo $_GET['data'] ?>" name="data" required>
    <input type="submit" value="Selecionar data">
  </form>
  <?php
  while ($rowp = mysqli_fetch_assoc($resultp)) {
    if ($rowp["datae"] == $_GET["data"]) {
      $aula = $rowp["aula"];
      $posicao = $rowp["position"];
      $nome = $rowp["nome"];
      if (!isset($nomesAulas[$aula])) {
        $nomesAulas[$aula] = array_fill(1, $_SESSION['num'], "");
      }
      $nomesAulas[$aula][$posicao] = $nome;
    }
  }

  ?>
  <table border=1 cellspacing="0" id="list">
    <tr>
      <th>Equipamentos</th>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<th>" . $row['equip'] . "</th>";
        $id_equip = $row['id_equip'];
        $_SESSION['num'] = mysqli_num_rows($result);
      }
      ?>
    </tr>

    <?php
    $_SESSION['data'] = $_GET['data'];

    foreach ($aulas as $aula => $tituloAula) {
      echo "<tr>";
      echo "<th>".$tituloAula."</th>";
    
      if (isset($nomesAulas[$aula])) {
        $nomesAula = $nomesAulas[$aula];
        mysqli_data_seek($result, 0);
    
        while ($row = mysqli_fetch_assoc($result)) {
          $id_equip = $row['id_equip'];
          echo "<td>";
          if (isset($nomesAula[$id_equip]) && $nomesAula[$id_equip] != '') {
            echo $nomesAula[$id_equip];
          }
          echo "</td>";
        }
      } else {
        for ($pass = 1; $pass <= $_SESSION['num']; $pass++) {
          echo "<td></td>";
        }
      }
      echo "</tr>";
    }
    $_SESSION['yes'] = null;
    $_SESSION['no'] = null;
    ?>
  </table>
  </div>
  </div>
  
  </div>
</body>

</html>