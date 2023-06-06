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
    $msg = $_SESSION['msg'];

    if ($msg == true) {
      ?>
      alert("insira o nome do equipamento");
      <?php
      $_SESSION['msg'] = false;
    }
    ?>
  </script>
</head>

<body>
  <a id = "return" href="locacao.php?data=<?php echo $_SESSION['data'] ?>"> <img src="voltar.png" width="50px"> </a>
  <div>
    <table border=1 cellspacing="0">
      <thead>
        <tr>
          <th> ID </th>
          <th> Equipamentos </th>
          <th> Marca </th>
          <th> Modelo </th>
          <th> Cor </th>
          <th> Deletar </th>
          <th> Atualizar </th>
        </tr>
      </thead>
      <?php
      include "conexao.php";
      $sqli = "SELECT * FROM logim";
      $pass = mysqli_query($conn, $sqli);

      $sql = "SELECT * FROM equipamento";
      $result = mysqli_query($conn, $sql);

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
              <?php echo $row["marca"] ?>
            </td>
            <td>
              <?php echo $row["modelo"] ?>
            </td>
            <td>
              <?php echo $row["cor"] ?>
            </td>
            <td>
              <?php echo "<a href='del_equip.php?del=" . $row["id_equip"] . "'> excluir </a>" . "<br>"; ?>
            </td>
            <td>
              <?php echo "<a href='at_equip.php?atu=" . $row["id_equip"] . "'> atualizar </a>" . "<br>"; ?>
            </td>
          </tr>
        </tbody>

        <?php
      }
      ?>
      <tr>
        <td>
          <input type="hidden" name="id" value="">
        </td>
        <td>
          <form action="add_equip.php" method="get">
            <input type="text" name="equip" value="">
        </td>
        <td>
          <input type="text" name="marca" value="">
        </td>
        <td>
          <input type="text" name="modelo" value="">
        </td>
        <td>
          <input type="text" name="cor" value="">
        </td>
        <td></td>
        <td></td>
      <tr>
        <td>
          <input type="submit" value="ADD">
        </td>
      </tr>
      </form>
      </tr>
    </table>

  </div>
</body>

</html>