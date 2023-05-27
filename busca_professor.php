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
    $mesg = $_SESSION['mesg'];

    if ($mesg == true) {
      ?>
      alert("insira o nome do professor");
      <?php
      $_SESSION['mesg'] = false;
    }
    ?>
  </script>

</head>

<body>
  <a href="locacao.php?data=<?php echo $_SESSION['data'] ?>"> voltar </a>

  <div>
    <table border=1 cellspacing="0">
      <thead>
        <tr>
          <th> ID </th>
          <th> Professores </th>
          <th> Aula </th>
          <th> Deletar </th>
          <th> Atualizar </th>
        </tr>
      </thead>
      <?php
      include "conexao.php";

      $nome = $_GET['nome'];

      $sql = "SELECT * FROM professores WHERE nome like '%$nome%'";
      $result = mysqli_query($conn, $sql);

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

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tbody>
            <tr>
              <td>
                <?php echo $row["id_prof"] ?>
              </td>
              <td>
                <?php echo $row["nome"] ?>
              </td>
              <td>
                <?php echo $row["aula"] ?>
              </td>
              <td>
                <?php echo "<a href='del_professor.php?del=" . $row["id_prof"] . "'> excluir </a>" . "<br>"; ?>
              </td>
              <td>
                <?php echo "<a href='at_nome.php?atu=" . $row["id_prof"] . "'> atualizar </a>" . "<br>"; ?>
              </td>
            </tr>
          </tbody>
          <?php

        }

      }
      ?>
      <tr>
        <td>
          <form action="add_prof.php" method="get">
            <input type="hidden" name="id" value="">

        </td>
        <td>
          <input type="text" name="nome" value="">

        </td>
        <td>
          <input type="text" name="aula" value="">
        </td>
        <td></td>
        <td></td>
      <tr>
        <td>
          <input type="submit" value="ADD">
          </form>
        </td>
      </tr>
      </tr>
    </table>
  </div>
</body>

</html>