<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
    <?php
    session_start();
    if ($_SESSION['yes'] == true) {
        echo "<script>
        alert('Seu login e senha foram cadastrados.')
        </script>";
        $_SESSION['yes'] = false;
    } else if ($_SESSION['no'] == true) {
        echo "<script>
        alert('Erro de cadastro.')
        </script>";
        $_SESSION['no'] = false;
    }
    ?>
</head>

<body>

<div class="container">
        <div class="box3">
            <div class="box"> <a href="locacao.php?data=<?php echo $_SESSION['data'] ?>" id="a"> X </a></div>
            <div class="box1">
            <div>  </div>
            <img src="logo.png">
                <h3>Sistema de Agendamento</h3>
                <h2>Adicionar Novo Usuário</h2>
                <form method="POST" action="cd_user.php">

                    <input type="text" id="login" name="user" value="" placeholder="Nome de Usuário"><br><br>

                    <input type="password" id="senha" name="senha" value="" placeholder="Senha"><br><br>

                    <select name="select" placeholder="Tipo de usuário">
                        <option value="1">Administrador</option>
                        <option value="0">Professor</option>
                    </select><br><br>
                    <button type="submit">Cadastrar</button>
                    <p id="div" style="margin-left: 20px"></p>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
