<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <a href="locacaoprof.php?data=<?php echo $_SESSION['data'] ?>"> voltar </a>

  <div>
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

      $equip = $_GET['equip'];

      $sql = "SELECT * FROM equipamento INNER JOIN professores ON equipamento.id_equip = professores.position WHERE equip = '$equip'";
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
</body>

</html>