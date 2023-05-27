<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
   
    <title>Document</title>
</head>

<body>

<div class="container">

<div class="boxs">
    <div class="box">
    <a href="locacao.php" id="a"> Voltar </a> <br>
    <h1>Sistema de Agendamento</h1>
    <h2>Adicionar Novo Usuário</h2>
    <form method="POST" action="cd_user.php">

        <input type="text" id="user" name="user" value="" placeholder="Nome de Usuário"><br><br>
      
        <input type="password" id="senha" name="senha" value="" placeholder="Senha"><br><br>

        <select name="select" placeholder="Tipo de usuário">
        <option value="1">Administrador</option>
        <option value="0">Professor</option>
        </select><br><br>
        <button type="submit">Cadastrar</button>
        <p id="div" style="margin-left: 20px"></p>
    </form>
    <?php
        session_start();
        if($_SESSION['yes'] == true){
            echo "<br>Seu login e senha foram cadastrados.";
            $_SESSION['yes'] = false;
        }
        else if($_SESSION['no'] == true){
            echo "Erro ao cadastrar login e senha.";
            $_SESSION['no'] = false;
        }
    ?>
</div>
    </div>
    </div>
</body>
</html>