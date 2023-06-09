<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="tabela.css">
  <title>Document</title>

  <script>
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
      header("location: index.php");
    }

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

  <div class="container">
    <div class="box3">
      <div class="box">
        <a id="return" href="locacao.php?data=<?php echo $_SESSION['data'] ?>"> <img src="voltar.png" width="50px"> </a>
      </div>
      <div class="box1">
        <div class="table">
          <h2> Data:
            <?php echo $_SESSION['showdate']?>
          </h2>

          <table border=1 cellspacing="0">
            <thead>
              <tr>
                <th> ID </th>
                <th> Professores </th>
                <th> Aula </th>
                <th> Equipamentos </th>
                <th> Deletar </th>
                <th> Atualizar </th>
              </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM equipamento INNER JOIN professores ON equipamento.id_equip = professores.position ORDER BY aula";
            $result = mysqli_query($conn, $sql);

            $sqla = "SELECT * FROM equipamento";
            $resulta = mysqli_query($conn, $sqla);

            while ($row = mysqli_fetch_assoc($result)) {
              if ($row["datae"] == $_SESSION["data"]) {
                ?>
                <tbody>
                  <tr>
                    <td>
                      <?php echo $row["id_prof"] ?>
                    </td>
                    <td>
                      <?php echo $row["nome"]; ?>
                    </td>
                    <td>
                      <?php echo $row["aula"]; ?>
                    </td>
                    <td>
                      <?php
                      if ($row['position'] == $row['id_equip']) {
                        echo $row["equip"];
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo "<a href='del_professor.php?del=" . $row["id_prof"] . "'> DELETAR </a>" . "<br>"; ?>
                    </td>
                    <td>
                      <?php echo "<a href='at_nome.php?atu=" . $row["id_prof"] . "'> ATUALIZAR </a>" . "<br>"; ?>
                    </td>
                  </tr>
                </tbody>
                <?php
              }

            }
            if (($_SESSION['data']) == null) {
              echo "<script> alert('Selecione uma data!') </script>";
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
                <select name="aula">
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
              </td>
              <td>
                <select name="position">
                  <?php
                  while ($rowa = mysqli_fetch_array($resulta)) { ?>
                    <option value="<?php echo $rowa["id_equip"]; ?>"><?php echo $rowa["equip"]; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </td>
              <td></td>
              <td></td>
            <tr>
              <td>
                <input type="submit" value="Salvar">
                </form>
              </td>
            </tr>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>