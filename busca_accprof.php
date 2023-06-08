<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="tabela.css">
  <title>Document</title>
  <style>
    div {
      display: inline;
    }
  </style>

  <script>
    <?php
    session_start();
    $msg == $_SESSION['msg'];

    if ($msg = true) {
      ?>
      alert("insira o nome do equipamento");
      <?php
      $_SESSION['mesg'] = false;
    }
    ?>
  </script>

</head>

<body>
<div class="container">
<div class="box3">
<div class="box">
  <a href="consulta_accprof.php?data=<?php echo $_SESSION['data'] ?>"> <img src="voltar.png" width="50px"> </a>
  </div>
  <div class="box1">
    <br>
  <div class="table">
    <table border=1 cellspacing="0">
      <thead>
        <tr>
          <th> ID </th>
          <th> Equipamentos </th>
          <th> Professor </th>
          <th> Aula </th>
          <th> Data </th>

        </tr>
      </thead>
      <?php
      include "conexao.php";
      include "pass.php";
      
      $equip = $_GET['equip'];
      $sql = "SELECT * FROM equipamento INNER JOIN professores ON equipamento.id_equip = professores.position WHERE equip like '%$equip%'";
      $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody>
              <tr>
                <td>
                  <?php echo $row["id_equip"] ?>
                </td>
                <td>
                  <?php echo $row["equip"] ?>
                </td>
                <td>
                  <?php echo $row["nome"] ?>
                </td>
                <td>
                  <?php echo $row["aula"] ?>
                </td>
                <td>
                  <?php echo $row["datae"] ?>
                </td>
              </tr>
            </tbody>
            <?php
          }
      ?>

    </table>
    </div>
    </div>
    </div>
  </div>
</body>

</html>